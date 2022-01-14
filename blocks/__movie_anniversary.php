  
<div id="rec<?php echo $MOVIE['num'] + 100000; ?>" class="r t-rec t-rec_pt_150" style="padding-top:0px; margin-bottom:1px;" data-animationappear="on" data-record-type="286"   >
<!-- t266 -->
<!-- cover -->

<div class="t-cover" id="recorddiv<?php echo $MOVIE['num'] + 100000; ?>" bgimgfield="img" style="height:100vh; background-image:url('<?php printSlideCover('movies', $MOVIE['id']); ?>');" >

    <div class="t-cover__carrier" id="coverCarry<?php echo $MOVIE['num'] + 100000; ?>" data-content-cover-id="<?php echo $MOVIE['id']; ?>"  data-content-cover-bg="<?php printSlideCover('movies', $MOVIE['id']); ?>" data-content-cover-height="100vh" data-content-cover-parallax=""        style="background-image:url('');height:100vh;background-attachment:scroll; "></div>
                <div class="t-cover__filter" style="height:100vh;background-color:#000000;filter:alpha(opacity:20);KHTMLOpacity:0.2;MozOpacity:0.2;opacity:0.2;"></div>
                <div class="t-container t266__container">
                    <div class="t-width t-width_12 t266__mainblock">
                        <div class="t266 t-align_center">
                            <div class="t-cover__wrapper t-valign_bottom" style="height:100vh;">
                                <div class="t266__wrapper" data-hook-content="covercontent">
                                    <div class="t266__title t-title t-title_xl" style="" field="title">
                                        <div style="line-height:30px;text-align:left;" data-customstyle="yes">
                                            <strong style="font-size:20px;"><?php if($next_birthday_year == $this_year){$format = "F d";} else {$format = "F d, $next_birthday_year";}  PrintDate($MOVIE['release_date'], $format); ?> </strong><br/>
                                            <strong style="font-size:25px;"> <?php  MovieAnniversary($next_birthday_year); ?> </strong>
                                            <br /><span style="font-size: 40px; "><?php echo strtoupper($MOVIE['title']); ?></span>
                                            <br />
                                            <span style="font-size: 30px;color:#000;background-color:#fff;filter:alpha(opacity:40);KHTMLOpacity:0.4;MozOpacity:0.4;opacity:0.4;"> <a title="Permanent link to <?php echo $MOVIE['title_original']; ?>" style="font-size: 30px;color:#000;" class="btn" href="<?php echo "https://www.cinemanni.com/" . $MOVIE['id']; ?>" data-clipboard-text="<?php echo "https://www.cinemanni.com/" . $MOVIE['id']; ?>"><?php echo $MOVIE['title_original']; ?></a></span>
                                          
                                            <span style="font-size: 20px;">
                                                
                                            <?php if (!(empty($MOVIE['imdb']))): ?>

                                             <a href="<?php echo $MOVIE['imdb']; ?>" style="">IMDB</a>&nbsp;

                                            <?php endif; ?> 
                                                   <?php if (!(empty($MOVIE['tspdt']))): ?>

                                             <a href="<?php echo $MOVIE['tspdt']; ?>" style="">TSPDT</a>&nbsp;

                                            <?php endif; ?>     


                                          


                                
                                          


                                         
                                            </span>

                                        </div>
                                    </div>
                                    <div class="t266__descr t-descr t-descr_sm" style="opacity:1;" field="descr">
                                        <div style="text-align:left;" data-customstyle="yes">
                                            <br />Directed by 

                                            <?php printAllDirectors(); ?>


                                            <br /><?php echo $MOVIE['country'] . "&nbsp;"; 
                                            PrintDate($MOVIE['release_date'], "Y"); ?>
                                            <br /><?php echo $MOVIE['genre']; ?>
                                            <br /><?php echo $MOVIE['mins'] . " min"; ?>
                                        </div>
                                    </div>
                                    <a class="t266__play-link" href="javascript:t266showvideo('<?php echo $MOVIE['num'] + 100000; ?>');">
                                        <div class="t266__play-icon">
                                            <div class="t266__play-icon-body" style="border-color: transparent transparent transparent #000000"></div>
                                            <div class="t266__play-bg" style="background-color:#fff; opacity:1;"></div>
                                        </div>
                                        <div class="t266__text t-descr t-descr_sm" field="text"><?php echo ucfirst($MOVIE['youtube_title']); ?></div>
                                    </a>

                                      <?php if (!(empty($MOVIE['itunes']))): ?>

                                            <a href="<?php echo $MOVIE['itunes']; ?>" style="">Watch at Amazon</a>&nbsp;

                                            <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="t266__video-container t266__hidden" data-content-popup-video-url-youtube="<?php echo $MOVIE['youtube']; ?>">
                    <div class="t266__video-carier"></div>
                    <a class="t266__video-bg" href="javascript:t266hidevideo('<?php echo $MOVIE['num'] + 100000; ?>');" style="; "></a>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#rec<?php echo $MOVIE['num'] + 100000; ?>").attr('data-animationappear', 'off');
                    $("#rec<?php echo $MOVIE['num'] + 100000; ?>").css('opacity', '1');
                });
            </script>
        </div>