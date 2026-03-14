<?php

Auth::logout();

header('Location: /login-form');
exit();