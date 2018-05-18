<div class="intec-content">
    <div class="intec-content-wrapper">
        <div class="row">
            <div class="col-md-4 col-xs-12">
                <img alt="sofa" src="/images/sofa.png">
            </div>
            <div class="col-md-8 col-xs-12">

                <div class="h2 intec-about-company-title" style="font-weight: bold">
                    О компании
                </div>
                <div class="readmore" style="line-height: 1.5">
                    <?
                    $APPLICATION->IncludeFile("/include/parts/company.text.php", Array(), Array(
                        "MODE"      => "html",
                        "NAME"      => "текст о компании",
                        "TEMPLATE"  => "company.text.php"
                    ));
                    ?>
                </div>

            </div>
        </div>
    </div>
</div><br>