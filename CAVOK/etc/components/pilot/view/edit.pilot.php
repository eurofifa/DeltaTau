<?php $item = $res['pilot']; ?>

<div class="row">
					<div class="col-sm-12">
						<div class="box box-color box-bordered">
							<div class="box-title">
								<h3>
									<i class="fa fa-user"></i>
									Edit Pilot Information
								</h3>
							</div>
							<div class="box-content nopadding">
								<ul class="tabs tabs-inline tabs-top">
									<li class="active">
										<a href="#profile" data-toggle="tab">
											<i class="fa fa-user"></i>Personal Information</a>
									</li>
									<li class="">
										<a href="#notifications" data-toggle="tab">
											<i class="fa fa-bullhorn"></i>Notifications</a>
									</li>
									<li class="">
										<a href="#security" data-toggle="tab">
											<i class="fa fa-lock"></i>Security</a>
									</li>
								</ul>
								<div class="tab-content padding tab-content-inline tab-content-bottom">
									<div class="tab-pane active" id="profile">
                                                                            <form action="<?php echo HTTP_PATH; ?>/pilot/edit" method="post" class="form-horizontal">
											<div class="row">
												<div class="col-sm-2">
													<div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden">
														<div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 84px; height: 84px; line-height: 84px;">
															<img src="img/demo/user-1.jpg" alt="">
														</div>
														<div>
															<span class="btn btn-default btn-file">
														<span class="fileinput-new">Select image</span>
															<span class="fileinput-exists">Change</span>
															<input type="file" name="...">
															</span>
															<a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
														</div>
													</div>
												</div>
												<div class="col-sm-10">
													<div class="form-group">
														<label for="name" class="control-label col-sm-2 right">Name:</label>
														<div class="col-sm-10">
															<input type="text" name="name" class="form-control" value="<?php echo $item['NAME']; ?>">
														</div>
													</div>
                                                                                                        <div class="form-group">
														<label for="licence_number" class="control-label col-sm-2 right">License:</label>
														<div class="col-sm-10">
															<input type="text" name="licence_number" class="form-control" value="<?php echo $item['licence_number']; ?>">
														</div>
													</div>
                                                                                                        <div class="form-group">
														<label for="phone" class="control-label col-sm-2 right">Phone:</label>
														<div class="col-sm-10">
															<input type="text" name="phone" class="form-control" value="<?php echo $item['phone']; ?>">
														</div>
													</div>               
										
													<div class="form-group">
														<label for="email" class="control-label col-sm-2 right">Email:</label>
														<div class="col-sm-10">
															<input type="text" name="email" class="form-control" value="<?php echo $item['email']; ?>">
															<div class="form-button">
																<a href="#" class="btn btn-grey-4 change-input">Request Change</a>
															</div>
														</div>
													</div>
                                                                                                        <div class="form-group">
														<label for="address" class="control-label col-sm-2 right">Address:</label>
														<div class="col-sm-10">
															<input type="text" name="address" class="form-control" value="<?php echo $item['address']; ?>">
														</div>
													</div>
													<div class="form-group">
														<label for="username" class="control-label col-sm-2 right">Username:</label>
														<div class="col-sm-10">
                                                                                                                    <input type="text" name="username" class="form-control" value="<?php echo $item['username']; ?>">  
                                                                                                                    <div class="form-button">
																<a href="#" class="btn btn-grey-4 change-input">Change Credentials</a>
                                                                                                                    </div>
														</div>
													</div>
													<div class="form-actions">
														<input type="submit" class="btn btn-primary" value="Save Changes">
													</div>
												</div>
											</div>
										</form>
									</div>
									<div class="tab-pane" id="notifications">
										<form action="#" class="form-horizontal">
											<div class="form-group">
												<label for="asdf" class="control-label col-sm-2">Email notifications</label>
												<div class="col-sm-10">
													<label class="checkbox">
														<input type="checkbox" name="asdf">Send me security emails</label>
													<label class="checkbox">
														<input type="checkbox" name="asdf">Send system emails</label>
													<label class="checkbox">
														<input type="checkbox" name="asdf">Lorem ipsum dolor</label>
													<label class="checkbox">
														<input type="checkbox" name="asdf">Minim veli</label>
												</div>
											</div>
											<div class="form-group">
												<label for="asdf" class="control-label col-sm-2">Email for notifications</label>
												<div class="col-sm-10">
													<select name="email" id="email">
														<option value="1">asdf@blasdas.com</option>
														<option value="2">johnDoe@asdasf.de</option>
														<option value="3">janeDoe@janejanejane.net</option>
													</select>
												</div>
											</div>
											<div class="form-actions">
												<input type="submit" class="btn btn-primary" value="Save">
												<input type="reset" class="btn" value="Discard changes">
											</div>
										</form>
									</div>
									<div class="tab-pane" id="security">
										<form action="#" class="form-horizontal">
											<div class="form-group">
												<label for="asdf" class="control-label col-sm-2">Disable account for</label>
												<div class="col-sm-10">
													<select name="email" id="email">
														<option value="1">1 week</option>
														<option value="2">2 weeks</option>
														<option value="3">3 weeks</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<label for="asdf" class="control-label col-sm-2">Lock account?</label>
												<div class="col-sm-10">
													<a href="more-locked.html" class="btn btn-danger">Lock account now</a>
												</div>
											</div>
											<div class="form-actions">
												<input type="submit" class="btn btn-primary" value="Save">
												<input type="reset" class="btn" value="Discard changes">
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


