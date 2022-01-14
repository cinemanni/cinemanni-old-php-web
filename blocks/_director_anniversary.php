<div id="rec<?php echo $DIRECTOR['num'] + 1000; ?>" class="r t-rec t-rec_pt_150" style="padding-top:0px; margin-bottom:1px;" data-animationappear="on" data-record-type="286"   >
<!-- t266 -->
<!-- cover -->

<div class="t-cover" id="recorddiv<?php echo $DIRECTOR['num'] + 1000; ?>" bgimgfield="img" style="height:100vh; background-image:url('<?php printSlideCover('directors', $DIRECTOR['id']); ?>');" >

    <div class="t-cover__carrier" id="coverCarry<?php echo $DIRECTOR['num'] + 1000; ?>" data-content-cover-id="<?php echo $DIRECTOR['id']; ?>"  data-content-cover-bg="<?php printSlideCover('directors', $DIRECTOR['id']); ?>" data-content-cover-height="100vh" data-content-cover-parallax=""        style="background-image:url('');height:100vh;background-attachment:scroll; "></div>
                <div class="t-cover__filter" style="height:100vh;background-color:#000000;filter:alpha(opacity:20);KHTMLOpacity:0.2;MozOpacity:0.2;opacity:0.2;"></div>
                <div class="t-container t266__container">
                    <div class="t-width t-width_12 t266__mainblock">
                        <div class="t266 t-align_center">
                            <div class="t-cover__wrapper t-valign_bottom" style="height:100vh;">
                                <div class="t266__wrapper" data-hook-content="covercontent">
                                    <div class="t266__title t-title t-title_xl" style="" field="title">
                                        <div style="line-height:30px;text-align:left;" data-customstyle="yes">
                                            <strong style="font-size:20px;"><?php if($next_birthday_year == $this_year){$format = "F d";} else {$format = "F d, $next_birthday_year";}  PrintDate($DIRECTOR['birthday'], $format); ?> </strong><br/>
                                            <strong style="font-size:25px;">  <?php  DirectorAnniversary($next_birthday_year); ?> </strong> 
                                            <br /><span style="font-size: 40px; "><?php echo strtoupper($DIRECTOR['name']); ?></span>
                
                                            <br />
                                            <span style="font-size: 20px;">

                                            <a href="<?php echo $DIRECTOR['id']; ?>">cinemAnni</a>&nbsp;

                                                
                                            <?php if (!(empty($DIRECTOR['imdb']))): ?>

                                             <a href="<?php echo $DIRECTOR['imdb']; ?>" style="">IMDB</a>&nbsp;

                                            <?php endif; ?> 


                                            <?php if (!(empty($DIRECTOR['tspdt']))): ?>    

                                            <a href="<?php echo $DIRECTOR['tspdt']; ?>" style="">TSPDT</a>&nbsp; 

                                            <?php endif; ?>      


                                            <?php if (!(empty($DIRECTOR['wikipedia']))): ?>    

                                            <a href="<?php echo $DIRECTOR['wikipedia']; ?>" style="">Wikipedia</a>&nbsp;

                                            <?php endif; ?>    
                                            </span>
                                        </div>
                                    </div>
                                    <?php if(!empty($DIRECTOR['biography_movie_id'])): ?>
                                    <div class="t266__descr t-descr t-descr_sm" style="opacity:1;" field="descr">

                                         <br /> <br /> 
                                        <div style="text-align:left;" data-customstyle="yes"><span style="font-size: 30px;">
                                            <?php echo $BIO_MOVIE['title'] ?> </span>
                                            <br /><strong><span data-redactor-tag="span" style="font-size:25"><a href="<?php echo $BIO_MOVIE['imdb'] ?>" style=""><?php echo $BIO_MOVIE['title_original']; ?></a> </span></strong>
                                  
                                            <br />Directed by 

                                             <?php printAllDirectors(); ?>
                                             
                                            <br /><?php echo $BIO_MOVIE['country'] . "&nbsp;"; 
                                            PrintDate($BIO_MOVIE['release_date'], "Y"); ?>
                                            <br /><?php echo $BIO_MOVIE['genre']; ?>
                                            <br /><?php echo $BIO_MOVIE['mins'] . " min"; ?>
                                            <div style="text-align:left;" data-customstyle="yes"></div>

                                        </div>
                                    </div>
                                     <?php endif; ?>
                                    <a class="t266__play-link" href="javascript:t266showvideo('<?php echo $DIRECTOR['num'] + 1000; ?>');">
                                        <div class="t266__play-icon">
                                            <div class="t266__play-icon-body" style="border-color: transparent transparent transparent #000000"></div>
                                            <div class="t266__play-bg" style="background-color:#fff; opacity:1;"></div>
                                        </div>
                                        <div class="t266__text t-descr t-descr_sm" field="text"><?php echo ucfirst($DIRECTOR['youtube_title']); ?></div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="t266__video-container t266__hidden" data-content-popup-video-url-youtube="<?php echo $DIRECTOR['youtube']; ?>">
                    <div class="t266__video-carier"></div>
                    <a class="t266__video-bg" href="javascript:t266hidevideo('<?php echo $DIRECTOR['num'] + 1000; ?>');" style="; "></a>
                </div>
            </div>
            <script type="text/javascript">
                $(document).ready(function() {
                    $("#rec<?php echo $DIRECTOR['num'] + 1000; ?>").attr('data-animationappear', 'off');
                    $("#rec<?php echo $DIRECTOR['num'] + 1000; ?>").css('opacity', '1');
                });
            </script>
        </div>