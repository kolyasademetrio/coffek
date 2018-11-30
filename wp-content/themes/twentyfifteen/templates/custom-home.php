<?php /* Template Name: CustomPage */ ?>

<?php

get_header(); ?>

    <?php /*echo CFS()->get('testfield'); */?>

<!-- mainForm -->
<div class="mainForm" style="background: #000 url(<?php echo CFS()->get('mainForm__bgImage'); ?>) no-repeat 0 0;">
    <div class="mainForm__contentInner">
        <div class="container mainForm__container">
            <div class="row mainForm__row">
                <div class="col-xs-12 mainForm__item">
                    <div class="mainForm__inner">
                        <div class="mainForm__logoWrap">
                            <div class="mainForm__logoText">
                                <?php echo CFS()->get('mainForm__logoText'); ?>
                            </div>
                            <div class="mainForm__logoSlogan">
                                <?php echo CFS()->get('mainForm__logoSlogan'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 mainFormItem__item mainFormItem__itemImg">
                    <div class="mainFormItem__imageItem">
                        <div class="mainFormItem__imageWrap">
                            <img src="<?php echo CFS()->get('mainFormItem__img'); ?>" alt="" class="mainFormItem__img">
                        </div>
                        <!--<div class="mainFormItem__note">
                            <?php /*echo CFS()->get('mainFormItem__note'); */?>
                        </div>-->
                    </div>
                </div>
                <div class="col-lg-7 col-md-12 col-sm-12 col-xs-12 mainFormItem__item mainFormItem__itemForm">
                    <div class="mainFormItem__formInner">
                        <div class="mainForm__inWrap">
                            <div class="mainFormItem__formTitle">
                                <?php echo CFS()->get('mainFormItem__formTitle'); ?>
                            </div>

                            <div class="mainForm__wrapIn">
                                <div class="mainForm__arrowWrap"></div>

                                <div class="mainFormItem__formDnldLinkWrap">
                                    <?php echo CFS()->get('mainFormItem__formDnldLink'); ?>
                                </div>

                                <div class="mainFormItem__note hidden">
                                    <?php echo CFS()->get('mainFormItem__note'); ?>
                                </div>

                                <?php
                                $auth_text = CFS()->get('mainForm__authText');
                                ?>

                                <div class="mainFormItem__formWrap">
                                    <section id="formSection" class="formSection">
                                        <ul class="mainForm__tabs">
                                            <li class="mainForm__tab tabs" data-target="auth">
                                                <a href="#mainFormItem__tabSectWrap">
                                                    <?php echo $auth_text; ?>
                                                </a>
                                                <span class="formTogleBtn">&times;</span>
                                            </li>
                                            <!--<li class="mainForm__tab tabs" data-target="reg"><span>Регистрация</span></li>-->
                                        </ul>

                                        <div class="mainFormItem__tabSectWrap" id="mainFormItem__tabSectWrap">
                                            <div class="mainFormItem__tabSectInner">
                                                <div class="mainFormItem__tabSectionPopupTitle">
                                                    <?php echo $auth_text; ?>
                                                </div>
                                                <div class="mainFormItem__tabSection" data-target="auth">
                                                    <form action="">
                                                        <div class="mainFormItem__formItem">
                                                            <input name="phone" type="text" placeholder="Телефон">
                                                        </div>
                                                        <div class="mainFormItem__formItem">
                                                            <input name="pass" type="password" placeholder="Пароль">
                                                        </div>
                                                        <div class="mainFormItem__formItem">
                                                            <input type="submit" value="<?php echo $auth_text; ?>">
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!--<div class="mainFormItem__tabSection" data-target="reg">
                                                <form action="">
                                                    <div class="mainFormItem__formItem">
                                                        <input name="fio" type="text" placeholder="Ф.И.О">
                                                    </div>
                                                    <div class="mainFormItem__formItem">
                                                        <input name="phone" type="text" placeholder="Телефон">
                                                    </div>
                                                    <div class="mainFormItem__formItem">
                                                        <input name="pass" type="password" placeholder="Пароль">
                                                    </div>
                                                    <div class="mainFormItem__formItem">
                                                        <input type="submit" value="Регистрация">
                                                        <span class="formTogleBtn">&times;</span>
                                                    </div>
                                                </form>
                                            </div>-->
                                        </div>
                                    </section>


                                    <!--<ul class="mainForm__tabs hidden__tabs">
                                    <li class="hidden__tab"><a href=".formSection" data-target="auth"><?php /*echo $auth_text; */?></a></li>
                                    <!--<li class="hidden__tab"><a href=".formSection" data-target="reg">Регистрация</a></li>
                                </ul>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="mainFormItem__note mainFormItem__note__bottom">
                        <?php echo CFS()->get('mainFormItem__note'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mainForm End -->

<!-- advantsCapabs -->
<div class="advantsCapabs">
    <div class="advants" id="advants">
        <div class="container advants__container">
            <div class="row advants__row">
                <div class="col-xs-12 advants__col">
                    <?php
                    $advants__title = CFS()->get('advants__title');
                    $advants__tabs = CFS()->get('advants__tabs');
                    ?>
                    <div class="advants__inner">
                        <?php
                        if($advants__title){
                            ?>
                            <div class="advants__title">
                                <?php echo $advants__title; ?>
                            </div>
                            <?php
                        }
                        ?>

                        <?php if(!empty($advants__tabs)) { ?>
                        <div class="advants__tabsWrap">
                            <ul class="advants__tabsHeaderList">
                                <?php
                                $tabsItem_i = 1;
                                foreach ($advants__tabs as $tabsItem => $tabsItemArr ) {
                                    ?>

                                    <li class="advants__tabsHeader" data-id="tab-<?php echo $tabsItem_i; ?>">
                                        <?php
                                        echo $tabsItemArr['header'];
                                        ?>
                                    </li>
                                    <?php
                                    $tabsItem_i++;
                                }
                                ?>
                            </ul>

                            <ul class="advants__tabsSectionWrap">
                                <?php
                                $tabsItem_y = 1;
                                foreach ($advants__tabs as $tabsItem => $tabsItemArr ) {
                                ?>

                                    <li class="advants__tabsItem">
                                        <div class="advants__tabsHeader advants__tabsHeaderHidden" data-id="tab-<?php echo $tabsItem_y; ?>">
                                            <?php
                                            echo $tabsItemArr['header'];
                                            ?>
                                        </div>
                                        <div class="advants__tabsSection" id="tab-<?php echo $tabsItem_y; ?>">
                                            <?php
                                            echo $tabsItemArr['section'];
                                            ?>
                                        </div>
                                    </li>

                                    <?php
                                    $tabsItem_y++;
                                }
                                ?>
                            </ul>

                            <div class="advants__line"></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="capabs" id="capabs">
        <?php
        $capabs__titleInner = CFS()->get('capabs__titleInner');
        ?>
        <?php
        if($capabs__titleInner){
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 capabs__colTitle">
                        <div class="capabs__titleInner">
                            <?php echo $capabs__titleInner; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

        <?php
        $capabs__row = CFS()->get('capabs__row');
        ?>

        <?php
        if ( !empty($capabs__row) ) {
            ?>
            <div class="capabs__rowWrap">
            <?php
            foreach ( $capabs__row as $capabs__rowKey => $capabs__rowValue ) {
                $itemQty = intval(array_values($capabs__rowValue['qty'])[0]);
                $classNameResponsive = "col-mlg-3 col-md-3";
                $padding_left_right = $capabs__rowValue['padding_left_right'];

                switch ($itemQty) {
                    case 4:
                        $classNameResponsive = "col-lg-3 col-md-3";
                        break;
                    case 3:
                        $classNameResponsive = "col-lg-4 col-md-4";
                        break;
                }
                ?>
                <div class="container capabs__container">
                    <div class="row capabs__row" style="padding: 0 <?php echo $padding_left_right; ?>">
                        <?php

                        $countCapabsCol = count($capabs__rowValue['capabs__col']);
                        if ( $countCapabsCol>0 ) {

                            $sm__class__last = '';
                            $col_i = 1;

                            foreach ( $capabs__rowValue['capabs__col'] as $capabs__col ) {

                                $class__last = ($countCapabsCol == $col_i) ? 'last' : '';
                                ?>

                                <div class="<?php echo $classNameResponsive; ?> col-sm-4 col-xs-6 capabs__col <?php echo $class__last; ?>">
                                    <div class="capabs__inner">
                                        <div class="capabs__imgContainer">
                                            <img src="<?php echo $capabs__col['img']; ?>" alt="" class="capabs__img">
                                            <img src="<?php echo $capabs__col['img_hover']; ?>" alt="" class="capabs__img hover">
                                        </div>
                                        <div class="capabs__itemFooter">
                                            <div class="capabs__itemTitle">
                                                <?php echo $capabs__col['title']; ?>
                                            </div>
                                            <div class="capabs__itemDescr">
                                                <?php echo $capabs__col['descr']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $col_i++;
                            }
                        }
                        ?>

                    </div>
                </div>
                <?php
            }
            ?>
            </div><!-- capabs__rowWrap End -->
            <?php
        }
        ?>
    </div>
</div>
<!-- advantsCapabs End -->

<!-- poss -->
<?php
$poss_bgColor = CFS()->get('poss_bgColor');
$poss_bg = CFS()->get('poss_bg');

$poss_ownerImg = CFS()->get('poss_ownerImg');
$poss_ownerText = CFS()->get('poss_ownerText');
$poss_ownerTab = CFS()->get('poss_ownerTab');
$poss_sellerImg = CFS()->get('poss_sellerImg');
$poss_sellerText = CFS()->get('poss_sellerText');
$poss_sellerTab = CFS()->get('poss_sellerTab');
?>

<div class="poss" id="poss" style="background: <?php echo $poss_bgColor; ?> url(<?php echo $poss_bg; ?>) no-repeat 0 0;">


    <div class="poss__header" style="background-color: <?php echo $poss_bgColor; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-push-6 col-md-12 poss__headerTabsWrap">
                    <div class="poss__inner">
                        <ul class="poss__headerList">
                            <li class="poss__headerListItem active" data-id="owner">
                                <?php echo $poss_ownerTab; ?>
                            </li>

                            <li class="poss__headerListItem" data-id="seller">
                                <?php echo $poss_sellerTab; ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="poss__footer">
        <section id="owner" class="poss__section active">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12 poss__fotterCol">
                        <div class="poss__imageWrap">
                            <img src="<?php echo $poss_ownerImg; ?>" alt="" class="poss__image">
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12 poss__fotterCol">
                        <div class="poss__textInner">
                            <div class="poss__textWrap">
                            <span>
                                <?php echo $poss_ownerText; ?>
                            </span>
                                <a href="#" class="poss__arrowToggleTab">❯</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="seller" class="poss__section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12 poss__fotterCol">
                        <div class="poss__imageWrap">
                            <img src="<?php echo $poss_sellerImg; ?>" alt="" class="poss__image">
                        </div>
                    </div>

                    <div class="col-md-6 col-xs-12 poss__fotterCol">
                        <div class="poss__textInner">
                            <div class="poss__textWrap">
                            <span>
                                <?php echo $poss_sellerText; ?>
                            </span>
                                <a href="#" class="poss__arrowToggleTab">❯</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

</div>
<!-- poss End -->

<!-- tryFree -->
<?php
$dwnld__title = CFS()->get('dwnld__title');
$dwnld__content = CFS()->get('dwnld__content');
$dwnld__link = CFS()->get('dwnld__link');
$tryFree__bg = CFS()->get('tryFree__bg');
$tryFree__bgColor = CFS()->get('tryFree__bgColor');
$tryFree__bg__phone = CFS()->get('tryFree__bg__phone');
?>
<div class="tryFree dwnld" id="tryFree" style="background: <?php echo $tryFree__bgColor; ?> url(<?php echo $tryFree__bg; ?>) no-repeat 0 0;">
    <?php
    if ( !empty($tryFree__bg__phone) ) {
        ?>
        <img src="<?php echo $tryFree__bg__phone; ?>" alt="" class="tryFree__bgImg">
        <?php
    }
    ?>
    <?php
    if(!empty($dwnld__title)) {
        ?>
        <div class="container dwnld__container">
            <div class="row dwnld__row">
                <div class="col-xs-12 dwnld__col">
                    <div class="dwnld__titleInner">
                        <div class="dwnld__title">
                            <?php echo $dwnld__title; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="container dwnld__container">
        <div class="row dwnld__row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 dwnld__col">
                <div class="dwnld__inner">
                    <?php
                    if(!empty($dwnld__content)) {
                        ?>
                        <div class="dwnld__content">
                            <?php echo $dwnld__content; ?>
                        </div>
                        <?php
                    }
                    ?>

                    <?php
                    if(!empty($dwnld__link)) {
                        ?>
                        <div class="dwnld__btnWrap">
                            <?php echo $dwnld__link; ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tryFree End -->


<?php
$feedback__slider = CFS()->get('feedback__slider');
$feedback__title = CFS()->get('feedback__title');
$feedback_show = CFS()->get('feedback_show');

if ( $feedback_show == true ) {

    if ( count($feedback__slider)>0 ) {
    ?>
    <!-- feedback -->
    <div class="feedback" id="feedback">
        <?php
        if (!empty($feedback__title)) {
            ?>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="feedback__title">
                            <?php echo $feedback__title; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>

        <div class="container-fluid feedback__container">
            <div class="row feedback__row">
                <div class="col-xs-12 feedback__col">
                    <div class="feedback__inner">
                        <div class="feedback__slider">
                            <?php
                            foreach ($feedback__slider as $slide_key => $slide) {
                                ?>
                                <div class="feedback__slide">
                                    <div class="feedback__slideInner">
                                        <div class="feedback__imgWrap">
                                            <img src="<?php echo $slide['img']; ?>" alt=""
                                                 class="feedback__userImg">
                                        </div>
                                        <div class="feedback__itemContent">
                                            <div class="feedback__messageWrap">
                                                <div class="feedback__message">
                                                    <?php echo $slide['message']; ?>
                                                </div>
                                            </div>
                                            <div class="feedback__userName">
                                                <?php echo $slide['name']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- feedback End -->

    <?php
    }
}
?>



<!-- try -->
<?php
$try__textTop = CFS()->get('try__textTop');
$try__textBottom = CFS()->get('try__textBottom');
$try__link = CFS()->get('try__link');
$try__bg = CFS()->get('try__bg');
$try__bgColor = CFS()->get('try__bgColor');
?>
<div class="try dwnld" id="try" style="background: <?php echo $try__bgColor; ?> url(<?php echo $try__bg; ?>) no-repeat 0 0;">

    <div class="container dwnld__container">
        <div class="row dwnld__row">
            <div class="col-lg-7 col-md-9 col-sm-12 col-xs-12 dwnld__col">
                <div class="dwnld__inner">
                    <div class="dwnld__content">
                        <?php
                        if(!empty($try__textTop)) {
                        ?>
                        <div class="dwnld__textTop">
                            <?php echo $try__textTop; ?>
                        </div>
                        <?php
                        }
                        ?>

                        <?php
                        if(!empty($try__textBottom)) {
                            ?>
                            <div class="dwnld__textBottom">
                                <?php echo $try__textBottom; ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div><!-- dwnld__content End -->

                    <?php
                    if(!empty($try__link)) {
                        ?>
                        <div class="dwnld__btnWrap">
                            <?php echo $try__link; ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- try End -->


<?php get_footer(); ?>