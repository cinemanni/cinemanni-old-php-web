     
    
      <div id="rec<?php echo $DIRECTOR['num'] + 1000; ?>" class="r t-rec t-rec_pt_150" style="padding-top:0px;  margin-bottom:1px;" data-animationappear="off" data-record-type="286">
            <!-- t266 -->
            <!-- cover -->
            <div class="t-cover" id="recorddiv<?php echo $DIRECTOR['num'] + 1000; ?>" bgimgfield="img" style="height:100vh; background-image:url('<?php printSlideCover('directors', $DIRECTOR['id']); ?>');">
                <div class="t-cover__carrier" id="coverCarry<?php echo $DIRECTOR['num'] + 1000; ?>" data-content-cover-id="<?php echo $DIRECTOR['num'] + 1000; ?>" data-content-cover-bg="<?php printSlideCover('directors', $DIRECTOR['id']); ?>" data-content-cover-height="100vh" data-content-cover-parallax="" style="background-image:url('<?php printSlideCover('directors', $DIRECTOR['id']); ?>');height:100vh;background-attachment:scroll; "></div>
                <div class="t-cover__filter" style="height:100vh;background-color:#000000;filter:alpha(opacity:40);KHTMLOpacity:0.4;MozOpacity:0.4;opacity:0.4;"></div>
                <div class="t-container t266__container">
                    <div class="t-width t-width_100 t266__mainblock">
                        <div class="t266 t-align_center">
                            <div class="t-cover__wrapper t-valign_bottom" style="height:100vh;">
                                <div class="t266__wrapper" data-hook-content="covercontent">
                                    <div class="t266__uptitle t-uptitle t-uptitle_xs" style="" field="subtitle">
                                        <div style="font-size:20px;text-align:left;" data-customstyle="yes">

                                            <strong><?php  PrintDate($DIRECTOR['birthday'], "F d, $next_birthday_year"); ?> </strong>
                                            <br />
                                        </div>
                                    </div>
                                    <div class="t266__title t-title t-title_xl" style="" field="title">
                                        <div style="font-size:30px;line-height:30px;text-align:left;" data-customstyle="yes">
                                            <strong>
                                                <span data-redactor-tag="span" style="font-size: 30px;">
                                                    <?php  DirectorAnniversary($next_birthday_year); ?>    
                                                </span>
                                            </strong>
                                            <br />
                                            <br /><strong></strong>
                                            <br /><span style="font-size: 62px;"><?php echo strtoupper($DIRECTOR['name']); ?> </span>
                                            <br /><a href="<?php echo $DIRECTOR['imdb']; ?>"><span style="font-size: 20px;">IMDB</span></a> | <a href="<?php echo $DIRECTOR['wikipedia']; ?>"><span style="font-size: 20px;">Wikipedia</span></a>  <div class="fb-send" data-href="<?php echo "https://www.cinemanni.com/" . $DIRECTOR['id']; ?>">
                                                
                                            </div>&nbsp;<div class="fb-like" data-href="<?php echo "https://www.cinemanni.com/" . $DIRECTOR['id']; ?>" data-layout="button" data-action="recommend" data-size="small" data-show-faces="false" data-share="false"></div>
                                            <br />
                                            <br />
                                            <br />
                                            <br />
                                        </div>
                                    </div>

                                    <?php if(!empty($DIRECTOR['biography_movie_id'])): ?>
                                    <div class="t266__descr t-descr t-descr_sm" style="opacity:1;" field="descr">
                                        <div style="text-align:left;" data-customstyle="yes"><span style="font-size: 40px;">
                                            <?php echo $BIO_MOVIE['title'] ?> </span>
                                            <br /><strong><span data-redactor-tag="span" style="font-size: 30px;"><a href="<?php echo $BIO_MOVIE['imdb'] ?>" style=""><?php echo $BIO_MOVIE['title_original']; ?></a> </span></strong>
                                            <br />
                                            <br />Directed by <a href="<?php echo $BIO_DIRECTOR['imdb']; ?>" style=""><strong><?php echo $BIO_DIRECTOR['name']; ?></strong></a>
                                            <br /><?php echo $BIO_MOVIE['country'] . "&nbsp;"; 
                                            PrintDate($BIO_MOVIE['release_date'], "Y"); ?>
                                            <br /><?php echo $BIO_MOVIE['genre']; ?>
                                            <br /><?php echo $BIO_MOVIE['mins'] . " mins"; ?>
                                            <div style="text-align:left;" data-customstyle="yes"></div>

                                        </div>
                                    </div>
                                     <?php endif; ?>

                                     <?php if(!empty($DIRECTOR['youtube'])): ?> 
                                    <a class="t266__play-link" href="javascript:t266showvideo('<?php echo $DIRECTOR['num'] + 1000; ?>');">
                                        <div class="t266__play-icon">
                                            <div class="t266__play-icon-body" style="border-color: transparent transparent transparent #000000"></div>
                                            <div class="t266__play-bg" style="background-color:#fff; opacity:1;"></div>
                                        </div>
                                        <div class="t266__text t-descr t-descr_sm" field="text">
                                            <?php echo $DIRECTOR['youtube_title']; ?> 
                                            <br />
                                        </div>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <?php if(!empty($DIRECTOR['youtube'])): ?>
                <div class="t266__video-container t266__hidden" data-content-popup-video-url-youtube="<?php echo $DIRECTOR['youtube']; ?>">
                    <div class="t266__video-carier"></div>
                    <a class="t266__video-bg" href="javascript:t266hidevideo('<?php echo $DIRECTOR['num'] + 1000; ?>');" style="; "></a>
                </div>
                <?php endif; ?>

            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#rec<?php echo $DIRECTOR['num'] + 1000; ?>").attr('data-animationappear', 'off');
                    $("#rec<?php echo $DIRECTOR['num'] + 1000; ?>").css('opacity', '1');
                });
            </script>
        </div>