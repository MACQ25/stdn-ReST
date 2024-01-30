<?php
    function password_proc($pass){
        $pass = filter_var($pass, FILTER_SANITIZE_SPECIAL_CHARS);
        return password_hash($pass, PASSWORD_DEFAULT);
    }

    function register($registerData, $dbh){

        $command = "INSERT INTO users (username, password) VALUES (?, ?)";

        $stmt = $dbh -> prepare($command);

        $un = filter_var($registerData["username"], FILTER_SANITIZE_SPECIAL_CHARS);

        $success = $stmt -> execute([$un, password_proc($registerData["password"])]); 

        if($success){
            return "user successfully added";
        } else return "Something went wrong, user might already exists!";
    }

?>