<div class="col-md-4">
								<?php if ($select_video_type == 'Local') { ?>
									<a class="img-box float-left add_play V_pop" onclick="return false" href="#" data-toggle="modal" data-target="#localVideoLocal">
									</a>
									<?php } ?>
									<?php if ($select_video_type == 'YouTube') { ?>
										<a class="img-box float-left <?php if (!empty($youtube_id)) { ?> add_play V_pop<?php echo $x;} ?>" onclick="return false" href="<?php echo $youtube_video; ?>" data-type="youtube" data-id="<?php echo $youtube_id; ?>" data-autoplay='true'>
										<?php echo $youtube_video; ?>
									</a>
										<?php } ?>
										<?php if (!empty($image)) { ?>
											<img class="img-fluid" src="<?php echo $image; ?>" />
										<?php } ?>
							</div>