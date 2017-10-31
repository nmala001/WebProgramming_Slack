                    
                    
 <!-- <form id="threadform" action="queries.php" method="POST">

                      <div  id= "message_reply" class=" thread input-group input-group-lg">
                          
                           <span class="input-group-addon" id="sizing-addon1">+</span>
                           <input type="text" class="form-control" placeholder="Type Your Message..." name = "message_content" id="message_content" aria-describedby="sizing-addon1">
                           <input type="hidden" name="created_by" id="created_by" value = <?php echo htmlspecialchars_decode($user) ?>>
                           <input type="hidden" name="to_message_id" id="to_message_id" value=<?php if (isset($_GET["to_message_id"])) {
                            echo $_GET["to_message_id"];}
                            else{
                              $var = 1;
                              echo htmlspecialchars_decode($var);
                              } ?>>
                            <input type="hidden" name="channel_id" id="channel_id" value=<?php if (isset($_GET["channel_id"])) {
                            echo $_GET["channel_id"];}
                            else{
                              $var = 1;
                              echo htmlspecialchars_decode($var);
                              } ?>>

                            <button type="button" class=" threadbutton btn btn-primary" name= "threadbutton">Submit
                                // <?php   if(isset($_POST['threadbutton'])) {  

                                // insertThreads(); 

                                }

                                ?> 


                            </button>
                        </div>

                        </form> -->

                         <!-- <div  id= 'message_reply' class='thread input-group input-group-lg'>

                          <form id ='threadform' action= 'queries.php' method='GET'>
                          
                           <span class='input-group-addon' id='sizing-addon1'>+</span>
                           <input type='text' class='form-control' placeholder='Type Your Message...' name = 'message_content' id='message_content' aria-describedby='sizing-addon1'>
                           <input type='hidden' name='created_by' id='created_by' value = <?php echo htmlspecialchars_decode($user) ?>>
                           <input type='hidden' name='to_message_id' id='to_message_id' value=<?php if (isset($_GET["message_id"])) {
                            echo $_GET["message_id"];}
                            else{
                              $var = 1;
                              echo htmlspecialchars_decode($var);
                              } ?>>
                            <input type='hidden' name='channel_id' id='channel_id' value=<?php if (isset($_GET["channel_id"])) {
                            echo $_GET["channel_id"];}
                            else{
                              $var = 1;
                              echo htmlspecialchars_decode($var);
                              } ?>>
                            <button type = "button" class= " threadbutton btn btn-primary" id ="thread" .$message_id. name= "threadbutton">Submit
                                <?php   if(isset($_POST['threadbutton'])) {  

                                insertThreads(); 

                                }

                                ?> 


                            </button>
                          </form>
                      </div> -->