<?php
    session_start();

    // variavel que verirfica se autenticação foi efetuada
    $user_auth = false;

    //usuarios do sistema
    $users_app = array(
        array('email' => 'adm@teste.net', 'senha' => '0123'),
        array('email' => 'user@teste.net', 'senha' => '4789'),
    );
    // echo '<pre>';
    // print_r($users_app);
    // echo '</pre>';
    
    foreach($users_app as $user){
        if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $user_auth = true;
        }
    }

    if ($user_auth) {
        echo 'Usuario Autenticado';
        $_SESSION['autenticado'] = 'SIM';
    }else{
        $_SESSION['autenticado'] = 'NÃO';
        header('Location: index.php?login=erro');
    }
?>