<?php
                                    session_start();
                                    error_reporting(0);
                                     $servername = "localhost";
                                    $username = "root";
                                    $password = ' ';
                                    $dbname = "phplogin";

                                    $conn = new mysqli($servername, $username, $password, $dbname);

                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    if (!$conn->set_charset("utf8")) { printf("Error loading character set utf8: %s\n", $conn->error); exit();}

                                
?>