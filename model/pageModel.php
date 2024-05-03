<?php 
    require_once('db.php');

    function homeDetails($username){
        $conn = getConn();
        $sql1 = "SELECT fname, picture FROM registration WHERE username = ?";
        $stmt = $conn->prepare($sql1);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $result =  $result->fetch_array();
        
        $stmt->close();
        $conn->close();

        return $result;
    }

    function login($username, $password){
        $conn = getConn();
        // Use prepared statement to retrieve user information
        $sql1 = "SELECT * FROM registration WHERE username = ?";
        $stmt = $conn->prepare($sql1);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $stmt->close();
        $conn->close();

        return $result;
    }

    function forgetPass($username, $answer1, $answer2){
        $conn = getConn();

        // Use prepared statement to prevent SQL injection
        $sql = "SELECT * FROM registration WHERE username=? AND answer1=? AND answer2=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $username, $answer1, $answer2);
        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();
        $conn->close();

        return $result;
    }

    function resetPass($hashed_password, $username){
        $conn = getConn();

        // Prepared statement
        $sql = "UPDATE registration SET password=? WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $username);
        $result = $stmt->execute();

        $stmt->close();
        $conn->close();

        return $result;
    }

    function changePass($newPassword, $loggedInusername){
        $conn = getConn();

        // Update the password in the database using a prepared statement
        $updateSql = "UPDATE registration SET password=? WHERE username=?";
        $stmt_update = $conn->prepare($updateSql);
        $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt_update->bind_param("ss", $hashedNewPassword, $loggedInusername);

        if ($stmt_update->execute()) {
            echo "Password updated successfully!";
        } else {
            echo "Error updating password: " . $stmt_update->error;
        }
        $stmt_update->close();
        $conn->close();
    }    

    function teacherDetail($loggedInusername){
        $conn = getConn();

        // Prepared statement to prevent SQL injection
        $sql = "SELECT * FROM registration WHERE username=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $loggedInusername);
        $stmt->execute();

        // Get the result
        $res = $stmt->get_result();
        $userData = $res->fetch_assoc();

        $stmt->close();
        $conn->close();
       return $userData;
    }

    function getStudents(){
        $conn = getConn();

        // Prepared statement to prevent SQL injection
        $sql = "SELECT * FROM students";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        // Get the result
        $studentResult = $stmt->get_result();
        
        $stmt->close();
        $conn->close();

        return $studentResult;
    }

    function teacherDetailUpdate($fname, $lname, $birthdate, $gender, $religion, $city, $country, $phone, $email, $loggedInusername){
        $conn = getConn();

        // Use prepared statement to update the profile
        $updateSql = "UPDATE registration SET fname=?, lname=?, birthdate=?, 
            gender=?, religion=?, city=?, country=?, 
            phone=?, email=? 
            WHERE username=?";
        $stmt = $conn->prepare($updateSql);
        $stmt->bind_param("ssssssssss", $fname, $lname, $birthdate, $gender, $religion, $city, $country, $phone, $email, $loggedInusername);

        if ($stmt->execute()) {
        } else {
        echo "Error updating profile: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

    function addCourse($loggedInusername, $chapter_number, $chapter_name, $description, $lectures){
        $conn = getConn();

        $errors['lecture'] = null;
        $conn->begin_transaction();

        // Prepare statement for course insertion
        $sql_course = "INSERT INTO courses (username, chapter_number, chapter_name, description) VALUES (?, ?, ?, ?)";
        $stmt_course = $conn->prepare($sql_course);
        $stmt_course->bind_param("siss", $loggedInusername, $chapter_number, $chapter_name, $description);

        if ($stmt_course->execute()) {
            // Get the last inserted course ID
            $course_id = $conn->insert_id;

            // Prepare statement for lecture insertion
            $sql_lecture = "INSERT INTO lectures (course_id, lecture_name, lecture_path) VALUES (?, ?, ?)";
            $stmt_lecture = $conn->prepare($sql_lecture);
            $stmt_lecture->bind_param("iss", $course_id, $lecture_name, $lecture_path);

            // Save lecture pathways in the database
            foreach ($lectures['name'] as $index => $lecture_name) {
                $lecture_path = "../uploads/" . basename($lecture_name); 

                if (file_exists($lecture_path)) {
                    $errors['lecture'] = "File already exists: " . $lecture_name;
                    break; 
                }

                $allowed_types = ['ppt', 'docx', 'pdf'];
                $file_type = strtolower(pathinfo($lecture_path, PATHINFO_EXTENSION));
                if (!in_array($file_type, $allowed_types)) {
                    $errors['lecture'] = "Invalid file type. Allowed types: ppt, doc, pdf";
                    break;
                }

                if ($stmt_lecture->execute()) {
                    // Save the lecture file
                    if (move_uploaded_file($lectures['tmp_name'][$index], $lecture_path)) {
                        // File uploaded successfully
                    } 
                    else {
                        $errors['lecture'] = "Error uploading file: " . $_FILES['lectures']['error'][$index];
                        break;
                    }
                } 
                else {
                    echo "Error inserting lecture data: " . $stmt_lecture->error;
                    break;
                }
            }
            $stmt_lecture->close();

            if (empty($errors['lecture'])) {
                $conn->commit();
                header('Location: ../controller/homeCtrl.php?goto=dashboard');
                exit();
            } else {
                header('Location: ../controller/homeCtrl.php?goto=addCourse');
                exit();
            }
        }
        else {
            echo "Error inserting course data: " . $stmt_course->error;
        }
        $stmt_course->close();
        $conn->close();

        return $errors['lecture'];
    }

    function register($fname, $lname, $birthdate, $gender, $religion, $city, $country, $phone, $email, $hashedPassword, $username, $answer1, $answer2){
        $conn = getConn();

        // Prepared statement
        $sql2 = "INSERT INTO registration (fname, lname, birthdate, gender, religion, city, country, phone, email, password, username, answer1, answer2)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql2);

        // Bind parameters
        $stmt->bind_param("sssssssssssss", $fname, $lname, $birthdate, $gender, $religion, $city, $country, $phone, $email, $hashedPassword, $username, $answer1, $answer2);

        // Execute the statement
        $stmt->execute();

        // Close the statement
        $stmt->close();
        $conn->close();   
    }

    function getCourses($loggedInusername){
        $conn = getConn();

        $sql = "SELECT * FROM courses WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $loggedInusername);
        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();
        $conn->close();

        return $result;
    }

    function getCourse($course_id, $loggedInusername){
        $conn = getConn();

        $sql = "SELECT * FROM courses WHERE id = ? AND username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $course_id, $loggedInusername);
        $stmt->execute();
        $result = $stmt->get_result();

        $stmt->close();
        $conn->close();

        return $result;
    }

    function getLecture($course_id){
        $conn = getConn();
        // Retrieve lectures for each course
        $lecture_sql = "SELECT * FROM lectures WHERE course_id = ?";
        $stmt_lecture = $conn->prepare($lecture_sql);
        $stmt_lecture->bind_param("i", $course_id);
        $stmt_lecture->execute();
        $lecture_result = $stmt_lecture->get_result();
        
        $stmt_lecture->close();
        $conn->close();

        return $lecture_result;
    }

    function getAssignment($loggedInusername){
        $conn = getConn();

        $assignmentsQuery = "SELECT * FROM assignments WHERE username=?";
        $stmt_assignments = $conn->prepare($assignmentsQuery);
        $stmt_assignments->bind_param("s", $loggedInusername);
        $stmt_assignments->execute();
        $result = $stmt_assignments->get_result();

        $stmt_assignments->close();
        $conn->close();

        return $result;
    }

    function getStudentAssigned($assignmentId){
        $conn = getConn();

        $assignedStudentsQuery = "SELECT s.student_name FROM students s
                                    JOIN assigned a ON s.student_id = a.student_id
                                    WHERE a.assignment_id = ?";
        $stmt_students = $conn->prepare($assignedStudentsQuery);
        $stmt_students->bind_param("i", $assignmentId);
        $stmt_students->execute();
        $studentsResult = $stmt_students->get_result();

        $stmt_students->close();
        $conn->close();

        return $studentsResult;
    }

    function insertAssignment($assignmentName, $instruction, $possiblePoints, $dueDateTime, $loggedInusername, $selected_students){
        $conn = getConn();
        $insertAssignmentQuery = "INSERT INTO assignments (assignment_name, instruction, 
                            possible_points, due_date_time, username) VALUES (?, ?, ?, ?, ?)";
        $stmt_assignment = $conn->prepare($insertAssignmentQuery);
        $stmt_assignment->bind_param("ssiss", $assignmentName, $instruction, $possiblePoints, $dueDateTime, $loggedInusername);
        
        if ($stmt_assignment->execute()) {
            // Get the assignment_id of the newly inserted assignment
            $assignmentId = $stmt_assignment->insert_id;

            // Insert selected students into the assigned table
            if (!empty($selected_students)) {
                foreach ($selected_students as $studentId) {
                    
                    $insertAssignedQuery = "INSERT INTO assigned (assignment_id, student_id) VALUES (?, ?)";
                    $stmt_assigned = $conn->prepare($insertAssignedQuery);
                    $stmt_assigned->bind_param("ii", $assignmentId, $studentId);
                    $stmt_assigned->execute();
                    $stmt_assigned->close();
                }
            }
        } else {
            echo "Error: " . $stmt_assignment->error;
        }

        $stmt_assignment->close();
        $conn->close();        
    }

    function deleteCourse($course_id,$loggedInusername){
        $conn = getConn();

        // Delete the lectures associated with the course using prepared statement
        $deleteLecturesSql = "DELETE FROM lectures WHERE course_id = ?";
        $stmt_deleteLectures = $conn->prepare($deleteLecturesSql);
        $stmt_deleteLectures->bind_param("i", $course_id);

        if ($stmt_deleteLectures->execute()) {
            $stmt_deleteLectures->close();

            // Delete the course itself using prepared statement
            $deleteCourseSql = "DELETE FROM courses WHERE id = ? AND username = ?";
            $stmt_deleteCourse = $conn->prepare($deleteCourseSql);
            $stmt_deleteCourse->bind_param("is", $course_id, $loggedInusername);
            $result = $stmt_deleteCourse->execute();

            $stmt_deleteCourse->close();
            $conn->close();  
            
            return $result;
        }
    }

    function updateCourse($new_description, $course_id, $loggedInusername, $new_lectures){
        $conn = getConn();
        $conn->begin_transaction();

        $errors['new_lecture'] = null;

        // Update the course description using prepared statement
        $update_sql = "UPDATE courses SET description = ? WHERE id = ? AND username = ?";
        $stmt_update = $conn->prepare($update_sql);
        $stmt_update->bind_param("sss", $new_description, $course_id, $loggedInusername);

        if ($stmt_update->execute()) {
            $stmt_update->close();

            // Delete existing lectures for the course using prepared statement
            $delete_lectures_sql = "DELETE FROM lectures WHERE course_id = ?";
            $stmt_delete_lectures = $conn->prepare($delete_lectures_sql);
            $stmt_delete_lectures->bind_param("s", $course_id);
            $stmt_delete_lectures->execute();

            // Save new lecture pathways in the database using prepared statement
            foreach ($new_lectures['name'] as $index => $new_lecture_name) {
                $new_lecture_path = "../uploads/" . basename($new_lecture_name);

                // Insert new lecture data into the database using prepared statement
                $sql_new_lecture = "INSERT INTO lectures (course_id, lecture_name, lecture_path) VALUES (?, ?, ?)";
                $stmt_new_lecture = $conn->prepare($sql_new_lecture);
                $stmt_new_lecture->bind_param("sss", $course_id, $new_lecture_name, $new_lecture_path);

                if ($stmt_new_lecture->execute() === FALSE) {
                    $errors['new_lecture'] = "Error inserting new lecture data: " . $stmt_new_lecture->error;
                    break;
                }

                // Save the new lecture file
                if (move_uploaded_file($new_lectures['tmp_name'][$index], $new_lecture_path)) {
                    // File uploaded successfully
                } else {
                    $errors['new_lecture'] = "Error uploading new file: " . $_FILES['new_lectures']['error'][$index];
                    break;
                }

                $stmt_new_lecture->close();
            }

            if (empty($errors['new_lecture'])) {
                $conn->commit();
                header('Location: viewCourses.php');
                exit();
            } else {
                $conn->rollback();
            }
        } else {
            echo "Error updating course data: " . $stmt_update->error;
        }
        return $errors['new_lecture'];
    }

    function fetchQuiz($loggedInusername){
        $conn = getConn();

        // Use prepared statement to query the database for the logged-in user's quizzes
        $sql = "SELECT * FROM quizzes WHERE created_by=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $loggedInusername);
        $stmt->execute();
        $res = $stmt->get_result();
        
        $stmt->close();
        $conn->close();  
        
        return $res;
    }

    function insertQuiz($quizName, $loggedInusername){
        $conn = getConn();

        $insertQuizQuery = "INSERT INTO quizzes (quiz_name, created_by) VALUES (?, ?)";
        $stmt_quiz = $conn->prepare($insertQuizQuery);
        $stmt_quiz->bind_param("ss", $quizName, $loggedInusername);

        if ($stmt_quiz->execute()) {
            // Get the quiz_id of the newly created quiz
            $quizId = $stmt_quiz->insert_id;

            $stmt_quiz->close();
            $conn->close();  
        
            return $quizId;
        }
        else{
            echo "Error: " . $stmt_quiz->error;
        }
    }

    function createQuestion($i, $quizId, $questionText, $marks, $correctOption){
        $conn = getConn();
        
        $insertQuestionSql = "INSERT INTO quiz_questions (quiz_id, question_text, marks) VALUES (?, ?, ?)";
        $insertOptionSql = "INSERT INTO quiz_options (quiz_id, question_id, option_text, is_correct) VALUES (?, ?, ?, ?)";

        $questionStatement = $conn->prepare($insertQuestionSql);
        $optionStatement = $conn->prepare($insertOptionSql);

        // Insert the question into the database
        $questionStatement->bind_param("iss", $quizId, $questionText, $marks);
        $questionStatement->execute();

        // Get the question_id of the newly created question
        $questionId = $conn->insert_id;

        // Insert answer options into the database
        for ($j = 1; $j <= 4; $j++) {
            $isCorrect = ($j == $correctOption) ? 1 : 0;
            $optionText = $_POST["option_$i" . "_$j"];

            $optionStatement->bind_param("iisi", $quizId, $questionId, $optionText, $isCorrect);
            $optionStatement->execute();
        }
        
        $questionStatement->close();
        $optionStatement->close();

    }

    function deleteQuiz($quiz_id, $loggedInusername){
        $conn = getConn();

        // Delete quiz from quizzes table using prepared statement
        $delete_quiz_sql = "DELETE FROM quizzes WHERE quiz_id=? AND created_by=?";
        $stmt_delete_quiz = $conn->prepare($delete_quiz_sql);
        $stmt_delete_quiz->bind_param("ss", $quiz_id, $loggedInusername);

        if ($stmt_delete_quiz->execute()) {
            $stmt_delete_quiz->close();

            // Delete questions related to the quiz from quiz_questions table using prepared statement
            $delete_questions_sql = "DELETE FROM quiz_questions WHERE quiz_id=?";
            $stmt_delete_questions = $conn->prepare($delete_questions_sql);
            $stmt_delete_questions->bind_param("s", $quiz_id);

            if ($stmt_delete_questions->execute()) {
                $stmt_delete_questions->close();

                // Delete options related to the quiz from quiz_options table using prepared statement
                $delete_options_sql = "DELETE FROM quiz_options WHERE quiz_id=?";
                $stmt_delete_options = $conn->prepare($delete_options_sql);
                $stmt_delete_options->bind_param("s", $quiz_id);

                if ($stmt_delete_options->execute()) {
                    $stmt_delete_options->close();
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function getQuiz($quizId, $loggedInusername){
        $conn = getConn();
        // Use prepared statement to get quiz details
        $sqlQuiz = "SELECT * FROM quizzes WHERE quiz_id=? AND created_by=?";
        $stmtQuiz = $conn->prepare($sqlQuiz);
        $stmtQuiz->bind_param("ss", $quizId, $loggedInusername);
        $stmtQuiz->execute();
        $resQuiz = $stmtQuiz->get_result();
        $quiz = $resQuiz->fetch_assoc();

        $stmtQuiz->close();
        $conn->close();

        return $quiz;
    }

    function getQuestions($quizId){
        $conn = getConn();
        // Use prepared statement to get quiz details
        $sqlQuestion = "SELECT * FROM quiz_questions WHERE quiz_id=?";
        $stmtQuestion = $conn->prepare($sqlQuestion);
        $stmtQuestion->bind_param("s", $quizId);
        $stmtQuestion->execute();
        $resQuestion = $stmtQuestion->get_result();

        $stmtQuestion->close();
        $conn->close();
        
        return $resQuestion;
    }

    function getOptions($questionId){
        $conn = getConn();
        // Use prepared statement to get options for each question
        $sqlOptions = "SELECT * FROM quiz_options WHERE question_id=?";
        $stmtOptions = $conn->prepare($sqlOptions);
        $stmtOptions->bind_param("s", $questionId);
        $stmtOptions->execute();
        $resOptions = $stmtOptions->get_result();

        $stmtOptions->close();
        $conn->close();
        
        return $resOptions;
    }
    
?>