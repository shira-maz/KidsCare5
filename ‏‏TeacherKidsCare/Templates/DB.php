<?php
                                    session_start();
                                    error_reporting(0);


                                    $servername = "localhost";
                                    $username = "isshiramt";
                                    $password = "Aa123456";
                                    $dbname = "isshiram_kidsCare";

                                    // Create connection
                                    $conn = new mysqli($servername, $username, $password, $dbname);

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    if (!$conn->set_charset("utf8")) { printf("Error loading character set utf8: %s\n", $conn->error); exit();}
?>