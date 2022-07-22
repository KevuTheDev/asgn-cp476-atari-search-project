<?php
require_once "Genres.php";
require_once "Query.php";
require_once "utils.php";

function add_game()
{
    $q = new Query();
    $result = $q->add_game($_SESSION["add_game"]);

    //session_unset();
    unset($_SESSION["add_game"]);
    $_SESSION["form_type"] = "add_game";

    if ($result == true) {
        $_SESSION["confirmation"] = "valid";
    } else {
        $_SESSION["confirmation"] = "invalid";
    }
    header("Refresh:1; url=confirmation.php");
}

function add_developer()
{
    $q = new Query();
    $result = $q->add_developer($_SESSION["add_developer"]);

    //session_unset();
    unset($_SESSION["add_developer"]);
    $_SESSION["form_type"] = "add_developer";
    $result = true;

    if ($result == true) {
        $_SESSION["confirmation"] = "valid";
    } else {
        $_SESSION["confirmation"] = "invalid";
    }
    header("Refresh:1; url=confirmation.php");
}

function edit_game()
{
    $q = new Query();
    $result = $q->update_game($_SESSION["edit_game"]);

    unset($_SESSION["edit_game"]);
    $_SESSION["form_type"] = "edit_game";
    $result = true;

    if ($result == true) {
        $_SESSION["confirmation"] = "valid";
    } else {
        $_SESSION["confirmation"] = "invalid";
    }
    header("Refresh:1; url=confirmation.php");
}

function process()
{
    if (isset($_SESSION["add_game"]) == true) {
        if (empty($_SESSION["add_game"]) == false) {
            add_game();
        }
    } else if (isset($_SESSION["add_developer"]) == true) {
        if (empty($_SESSION["add_developer"]) == false) {
            add_developer();
        }
    } else if (isset($_SESSION['edit_game']) == true) {
        if (empty($_SESSION["edit_game"]) == false) {
            edit_game();
        }
    } else {
        print "OH NO";
    }
}

process();