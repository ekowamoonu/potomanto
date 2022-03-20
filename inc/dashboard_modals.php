                   
                    <!--edit country modal-->
                    <div class="modal fade" id="country" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Update Your Institution Details</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                  <select class="form-control" name="co" id="co">
                                    <option value="default">Country Institution Is Located</option>
                                    <?php echo $cifd; ?>
                                  </select>
                                  </div>
                                  <div class="form-group">
                                   <select class="form-control" name="institution" id="institution">
                                    <option value="default" class="institution">Institution Attended</option>
                                   </div>
                                  </select>
                                  </div>
                                  <div class="form-group">
                                  <select class="form-control" name="faculty" id="faculty">
                                    <option value="default">School Or Faculty You Were In</option>
                                    <?php echo $faculty_var; ?>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <select class="form-control" name="department" id="department">
                                    <option value="default">Specific Department</option>
                              
                                  </select>
                                </div>
                              <input type="submit" name="country_submit" class="btn btn-success" value="Update My Academic Profile"/>
                           </form>                         
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->

                   <!--edit firstname modal-->
                    <div class="modal fade" id="firstname" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Edit your first name</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                              <div class="form-group">
                              <input type="text" class="form-control" name="firstname"/>
                              </div>
                              <input type="submit" name="firstname_submit" class="btn btn-success" value="make changes"/>
                           </form>                         
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->

                    <!--edit lastname modal-->
                    <div class="modal fade" id="lastname" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Edit your last name</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                              <div class="form-group">
                              <input type="text" class="form-control" name="lastname"/>
                              </div>
                              <input type="submit" name="lastname_submit" class="btn btn-success" value="make changes"/>
                           </form>                         
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->
                    
                    <!--edit email modal-->
                    <div class="modal fade" id="email" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Edit your email</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                              <div class="form-group">
                              <input type="email" class="form-control" name="email"/>
                              </div>
                              <input type="submit" name="email_submit" class="btn btn-success" value="make changes"/>
                           </form>                         
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->
                    
                    <!--edit call_line modal-->
                    <div class="modal fade" id="call_line" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Edit your call line</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                              <div class="form-group">
                              <input type="text" class="form-control" name="call_line"/>
                              </div>
                              <input type="submit" name="call_line_submit" class="btn btn-success" value="make changes"/>
                           </form>                         
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->
                      
                      <!--edit whatsapp modal-->
                    <div class="modal fade" id="whatsapp" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Edit your whatsapp contact</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                              <div class="form-group">
                              <input type="text" class="form-control" name="whatsapp"/>
                              </div>
                              <input type="submit" name="whatsapp_submit" class="btn btn-success" value="make changes"/>
                           </form>                         
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->
                    
                    <!--edit firstname modal-->
                    <div class="modal fade" id="facebook" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Edit your facebook name</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                              <div class="form-group">
                              <input type="text" class="form-control" name="facebook"/>
                              </div>
                              <input type="submit" name="facebook_submit" class="btn btn-success" value="make changes"/>
                           </form>                         
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->
                     
                     <!--edit status modal-->
                    <div class="modal fade" id="status" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Edit your status</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                              <div class="form-group">
                                <select class="form-control" name="status">
                                  <option value="default">Status At Your Institution</option>
                                  <option value="first year">First Year</option>
                                  <option value="sophomore">Sophomore</option>
                                  <option value="third year">Third Year</option>
                                  <option value="fourth year">Fourth Year</option>
                                  <option value="fifth year">Fifth Year</option>
                                  <option value="sixth year">Sixth Year</option>
                                  <option value="seventh year">SeventhYear</option>
                                  <option value="masters">Masters</option>
                                  <option value="m.phil">M.Phil</option>
                                  <option value="alumni">Alumni</option>
                                  <option value="alumni and current employee">Alumni And Current Employee There</option>
                                </select>
                              </div>
                              <input type="submit" name="status_submit" class="btn btn-success" value="make changes"/>
                           </form>                         
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->
                     
                     <!--edit speciality modal-->
                    <div class="modal fade" id="speciality" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Edit your speciality</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                              <div class="form-group">
                              <input type="text" class="form-control" name="speciality"/>
                              </div>
                              <input type="submit" name="speciality_submit" class="btn btn-success" value="make changes"/>
                           </form>                         
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->
                    
                    <!--edit mmt modal-->
                    <div class="modal fade" id="mmt" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Changes To Your Most Memorable Times On Campus </h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                              <div class="form-group">
                              <textarea class="form-control" name="mmt" style="max-width:100%;">
                          
                              </textarea>
                              </div>
                              <input type="submit" name="mmt_submit" class="btn btn-success" value="make changes"/>
                           </form>                         
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->

                     <!--edit mct modal-->
                    <div class="modal fade" id="mct" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Changes To Your Most Challenging Times On Campus </h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                              <div class="form-group">
                              <textarea class="form-control" name="mct" style="max-width:100%;">
                          
                              </textarea>
                              </div>
                              <input type="submit" name="mct_submit" class="btn btn-success" value="make changes"/>
                           </form>                         
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->
                      
                      <!--edit fc modal-->
                    <div class="modal fade" id="fc" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Edit your favorite course</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                              <div class="form-group">
                              <input type="text" class="form-control" name="fc"/>
                              </div>
                              <input type="submit" name="fc_submit" class="btn btn-success" value="make changes"/>
                           </form>                         
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->
                    
                     <!--edit ambitions modal-->
                    <div class="modal fade" id="ambitions" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Changes To Your Ambitions</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                              <div class="form-group">
                              <textarea class="form-control" name="ambitions" style="max-width:100%;">
                          
                              </textarea>
                              </div>
                              <input type="submit" name="ambitions_submit" class="btn btn-success" value="make changes"/>
                           </form>                         
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->

                      <!--edit profile photo modal-->
                    <div class="modal fade" id="poto_face" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Update Poto-Face</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                               <input type="file" name="photo"/>
                              </div>
                              <input type="submit" name="photo_submit" class="btn btn-success" value="update my photo"/>
                           </form>                         
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->


                      <!--edit profile photo modal-->
                    <div class="modal fade" id="personality" tabindex="-1"><!--modal div begins-->
                      <div class="modal-dialog"><!--modal dialog begins-->
                        <div class="modal-content"><!-- modal-content begins -->
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                            <h3 class="modal-title">Update Personality</h3>
                          </div>
                          <div class="modal-body"><!-- modal-body begins -->
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                              <input type="text" name="team_work" id="team_work" class="form-control"  placeholder="Team work skills(over 100). Example: 85" title="over 100"/>
                              </div>
                              <div class="form-group">
                              <input type="text" name="human_relations" class="form-control"  placeholder="Human relations(over 100)"/>
                              </div>
                              <div class="form-group">
                              <input type="text" name="personality" class="form-control" placeholder="Personality and attitude(over 100)"/>
                              </div>
                              <div class="form-group">
                              <input type="text" name="openess" class="form-control"  placeholder="Openess to learn new stuff(over 100)"/>
                              </div>
                              <input type="submit" name="personality_submit" class="btn btn-success" value="update my personality"/>
                           </form>                         
                          </div><!-- modal-body ends -->
                        </div><!-- modal-content ends -->
                      </div><!--modal dialog ends-->
                    </div><!--modal div ends-->

