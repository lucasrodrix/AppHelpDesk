<?php
    session_start();

    // variavel que verirfica se autenticação foi efetuada
    $user_auth = false;
    $user_id = null;
    $user_perfil_id = null;

    $perfis = array(1 => 'Administrativo',2 => 'Usuário');

    //usuarios do sistema
    $users_app = array(
        array('id'=> 1, 'email' => 'adm@teste.net', 'senha' => '0123', 'perfil_id' => 1),
        array('id'=> 2, 'email' => 'lucas@teste.net', 'senha' => '4789', 'perfil_id' => 2),
        array('id'=> 3, 'email' => 'renata@teste.net', 'senha' => '4789', 'perfil_id' => 2),
    );
    
    foreach($users_app as $user){
        if ($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
            $user_auth = true;
            $user_id = $user['id'];
            $user_perfil_id = $user['perfil_id'];
        }
    }

    if ($user_auth) {
        echo 'Usuario Autenticado';
        $_SESSION['autenticado'] = 'SIM';
        $_SESSION['id'] = $user_id;
        $_SESSION['perfil_id'] = $user_perfil_id;
        header('Location: home.php');
    }else{
        $_SESSION['autenticado'] = 'NÃO';
        header('Location: index.php?login=erro');
    }
?>