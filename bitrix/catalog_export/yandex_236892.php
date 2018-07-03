<? $disableReferers = false;
if (!isset($_GET["referer1"]) || strlen($_GET["referer1"])<=0) $_GET["referer1"] = "yandext";
$strReferer1 = htmlspecialchars($_GET["referer1"]);
if (!isset($_GET["referer2"]) || strlen($_GET["referer2"]) <= 0) $_GET["referer2"] = "";
$strReferer2 = htmlspecialchars($_GET["referer2"]);
header("Content-Type: text/xml; charset=windows-1251");
echo "<"."?xml version=\"1.0\" encoding=\"windows-1251\"?".">"?>
<!DOCTYPE yml_catalog SYSTEM "shops.dtd">
<yml_catalog date="2018-07-03 04:23">
<shop>
<name>Интернет-магазин Спорт застава</name>
<company>sportzastava.ru</company>
<url>http://sportzastava.ru</url>
<platform>1C-Bitrix</platform>
<currencies>
<currency id="RUB" rate="1" />
<currency id="USD" rate="64.81" />
<currency id="EUR" rate="71.71" />
<currency id="UAH" rate="2.604" />
<currency id="BYN" rate="32.34" />
</currencies>
<categories>
<category id="154">Беговые дорожки</category>
<category id="155">Эллиптические тренажеры</category>
<category id="156">Велотренажеры</category>
<category id="157">Гребные тренажеры</category>
<category id="158">Батуты</category>
</categories>
<offers>
<offer id="2067" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/professionalnaya_begovaya_dorozhka_proxima_exclusive/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>179990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6fa/6fa89a8e2982f3ee0882a6fb2d3ebefc.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Профессиональная беговая дорожка PROXIMA Exclusive</name>
<description></description>
<manufacturer_warranty>2 года; рама – 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2068" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_svensson_body_labs_ortholine_ultra_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>66990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2bd/2bd135dbdc4c3d17b36a8b44d15de78f.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка SVENSSON BODY LABS ORTHOLINE ULTRA M</name>
<description></description>
<manufacturer_warranty>Рама - 7 лет, Двигатель - 3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2069" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_ammity_classic_atm_522_tft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>105990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1aa/1aa707c95298b94a19f159c883177f1d.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка AMMITY Classic ATM 522 TFT</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2070" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_elektricheskaya_adidas_t_16/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>64990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a6b/a6b91156b464f9d3e83605d342785383.jpg</picture>
<vendor>Adidas</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка электрическая Adidas T-16</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2071" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_svensson_body_labs_physioline_tmx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>79990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a8c/a8c1b4f6710e64f6d08689efc7f32f39.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка SVENSSON BODY LABS PHYSIOLINE TMX</name>
<description></description>
<manufacturer_warranty>Рама - 7 лет, Двигатель - 3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2072" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_applegate_t40_mdc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>40890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e14/e140c622f9b5f9edbbc06d15f6835eb5.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка APPLEGATE T40 МDC</name>
<description></description>
<manufacturer_warranty>Рама - 3 года, Двигатель - 2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2073" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_svensson_body_labs_ortholine_trx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>63990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/88e/88e3e350933f87b0e8e33dc594242d00.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка SVENSSON BODY LABS ORTHOLINE TRX</name>
<description></description>
<manufacturer_warranty>Рама - 7 лет, Двигатель - 3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2074" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_ammity_pro_atm_7500/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>330000</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2fe/2fe85b3828dc9ecbeefe420df7e07e61.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка AMMITY PRO ATM 7500</name>
<description></description>
<manufacturer_warranty>2 + 1 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2075" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_svensson_body_labs_ortholine_ultra_z/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>82990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/147/14760c94b1a12f79bcb2cc60ae45bfa4.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка SVENSSON BODY LABS ORTHOLINE ULTRA Z</name>
<description></description>
<manufacturer_warranty>Рама - 7 лет, Двигатель - 3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2076" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_ammity_classic_atm_722_tft_ac/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>135000</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/413/4131d771234b2da897e4ffe25264899e.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка AMMITY CLASSIC+ ATM 722 TFT+ AC</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2077" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_proxima_triniti_js_5000a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>58990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a3a/a3a4f5b020a1dd6c482ad8522d4ec4dc.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка PROXIMA TRINITI JS-5000A</name>
<description></description>
<manufacturer_warranty>2года; рама – 3 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2078" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_elektricheskaya_royal_fitness_rf_2_f_53/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7d8/7d871144c601a009bed6490ae5038764.jpg</picture>
<vendor>Royal Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка электрическая Royal Fitness RF-2 (F-53)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2079" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_svensson_body_labs_ortholine_thx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>55990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/178/1783647d16adc56a6711dfb18d8f92df.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка SVENSSON BODY LABS ORTHOLINE THX</name>
<description></description>
<manufacturer_warranty>Рама - 7 лет, Двигатель - 3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2080" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_proxima_kenturia_js_4500/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>56990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6e4/6e47e39d58ac5b22c4ac4ca314007d0e.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка PROXIMA KENTURIA JS-4500</name>
<description></description>
<manufacturer_warranty>2года; рама – 3 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2081" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_svensson_body_labs_ortholine_ttx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>75990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c44/c446a9cb23848ee459882d122cc46278.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка SVENSSON BODY LABS ORTHOLINE TTX</name>
<description></description>
<manufacturer_warranty>Рама - 7 лет, Двигатель - 3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2082" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_laguna_ii_laguna_ii_ml/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8a0/8a029282b426de16891ee5f2d791017e.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN LAGUNA II / LAGUNA II ML</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2083" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_svensson_body_labs_physioline_tdx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bd9/bd9bfdc30dab3ca0d7c4a719005757a7.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка SVENSSON BODY LABS PHYSIOLINE TDX</name>
<description></description>
<manufacturer_warranty>Рама - 7 лет, Двигатель - 3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2084" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_proxima_gloria_js_425100/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>63990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d67/d679ea4cbdc022801dbaff5389c504c2.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка PROXIMA GLORIA JS-425100</name>
<description></description>
<manufacturer_warranty>2года; рама – 3 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2085" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_proxima_legia_js_10430/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/da2/da2e93e0c5d623b6eadd62a77a7104e3.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка PROXIMA LEGIA JS-10430</name>
<description></description>
<manufacturer_warranty>2года; рама – 3 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2086" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_svensson_body_labs_physioline_tnx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>94990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/98a/98a0d4f5796400a26d43e56f3a11ad5b.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка SVENSSON BODY LABS PHYSIOLINE TNX</name>
<description></description>
<manufacturer_warranty>Рама - 7 лет, Двигатель - 3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2087" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_astra_t_200/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>22990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7cb/7cbcbf83976a0b77e3ed5bc8bed93ab8.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC ASTRA T-200</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2088" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_proxima_persona_t_8501e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>72990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/120/1201eab4ab25747e8fcaf21b73bce5db.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка PROXIMA PERSONA T-8501E</name>
<description></description>
<manufacturer_warranty>2года; рама – 3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2089" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_proxima_julietta_js_484400/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>33990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f4c/f4c84dd27d2145528b34334beadc24d4.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка PROXIMA JULIETTA JS-484400</name>
<description></description>
<manufacturer_warranty>2года; рама – 3 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2090" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_pro_form_performance_1850/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>89990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/50c/50ce2dcac20cf2fa37b4457ace7c5bef.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка PRO-FORM Performance 1850</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2091" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_eco_et_18_ai_plus/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>61990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/dd3/dd33d7b357743a4a5221e6bf25d0c663.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit Eco ET 18 AI Plus</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2092" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_proxima_bella_js_455000/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>51990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/985/98505cebba204817fa58fb3b55acef35.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка PROXIMA BELLA JS-455000</name>
<description></description>
<manufacturer_warranty>2года; рама – 3 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2093" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_premium_world_runner_t1/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>76890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6fe/6fe093ef9fd74d85c01a9c61428edee5.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON PREMIUM WORLD RUNNER T1</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2094" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_x7i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>119990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ec4/ec467db96253266497f378ee5c93ce0a.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack X7i</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2095" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_premium_world_runner_t2/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/eb7/eb7b10a0ec1986a5433983abdf59f228.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON PREMIUM WORLD RUNNER T2</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2096" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_applegate_t20_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31390</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ab5/ab59a5262a87326ba8ba1346f08dd2b3.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка APPLEGATE T20 М</name>
<description></description>
<manufacturer_warranty>Рама - 3 года, Двигатель - 2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2097" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_eco_et_20_ai_plus/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>75990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/49a/49ab32f32e30d5387f999b522b968e27.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit Eco ET 20 AI Plus</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2098" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_yukon_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24390</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/cc0/cc0959c1f7120e6535d59b13400498df.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON YUKON HRC+</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2099" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_villa_deluxe_ii_al_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>64890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/41b/41b40f4050db4cbc3b2524b9e2e81483.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN VILLA DELUXE II AL HRC</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2100" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_family_tm_500a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>64990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/cf5/cf5bf2f0c0a9e533b06c896863f038f1.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Family TM 500A</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2101" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_plasma_iii_lc_tft_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/260/260af0b962b24ab61c0465e1e84b1fbc.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN PLASMA III LC TFT HRC</name>
<description></description>
<manufacturer_warranty>5 лет бытовое / 1,5 года полукоммерческое</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2102" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_magma_ii_ml_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>61990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a4d/a4d3b97492a61bfc61704b505cca5276.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN MAGMA II ML HRC</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2103" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_villa_deluxe_ii_ml_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>57890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7fe/7fedd9d0ad222e9d2c756733158622ae.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN VILLA DELUXE II ML HRC</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2104" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_f_concept/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/893/8930b1a7753b27f1bda0eb3ba64fc731.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN F-CONCEPT</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2105" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_t706_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>45490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/599/59980d22bb7459abe12be3f97adcdef0.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON T706 HRC</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2106" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_applegate_t50_adc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/076/076d784c65300c258d22284249af79d6.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка APPLEGATE T50 ADC</name>
<description></description>
<manufacturer_warranty>Рама - 3 года, Двигатель - 2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2107" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_riviera_iii_al/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>58890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/07f/07f6c0ae07101189454cbbadf54e5cd6.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN RIVIERA III AL</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2108" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_thx_05_pafers_edition/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>42690</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f0b/f0b82dde416365c03faea6421d782552.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON THX 05 PAFERS EDITION</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2109" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_quanta_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>78990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e62/e6278825ef8b18e4e159d30361f77fe0.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN QUANTA HRC</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2110" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_applegate_t30_mdc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34190</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b23/b23b4de0a2086b2d880f324ae8c3610a.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка APPLEGATE T30 МDC</name>
<description></description>
<manufacturer_warranty>Рама - 3 года, Двигатель - 2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2111" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_family_tm_300a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bcb/bcb20535087ce7682e33ee02585bc34b.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Family TM 300A</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2112" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_applegate_t40_adc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>45590</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/570/570f2d7a752f6a084554a4981d921549.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка APPLEGATE T40 ADC</name>
<description></description>
<manufacturer_warranty>Рама - 3 года, Двигатель - 2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2113" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_proform_performance_1050/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>50990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fb7/fb79eef3db2eeb69e44c447f21be8d6f.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка ProForm Performance 1050</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2114" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_laguna_ii_al_vibra/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2ec/2ec96fba548e48fc2ad2a707311362ab.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN LAGUNA II AL VIBRA</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2115" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_c220i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>58990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2df/2df4fa3c21f5702863990e5778981375.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack C220i</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2116" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_svensson_body_labs_physioline_tbx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e9a/e9ab2e64d3e5c48ce420017087f74154.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка SVENSSON BODY LABS PHYSIOLINE TBX</name>
<description></description>
<manufacturer_warranty>Рама - 7 лет, Двигатель - 3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2117" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_tesla_tft_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>109890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6f3/6f32f8386bc9e337a4ca230f825875dc.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN TESLA TFT HRC</name>
<description></description>
<manufacturer_warranty>5 лет бытовое / 1,5 года полукоммерческое</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2118" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_riviera_iii_ml/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/084/084f0fa7f29bc5c8289eb0c4442b1142.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN RIVIERA III ML</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2119" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_applegate_t30_adc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>38990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f1c/f1c43c4cb52c6b66f26670bc171d02d9.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка APPLEGATE T30 ADC</name>
<description></description>
<manufacturer_warranty>Рама - 3 года, Двигатель - 2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2120" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_t906_ent_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>79990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3a4/3a41497ab1cbc1986cff9afbee14ae14.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON T906 ENT HRC</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2121" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_riviera_ii_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>47890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/687/687b329ef9870ce4a6d24ec4b5d486aa.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN RIVIERA II HRC+</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2122" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_t806_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>64490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3ed/3ede34ec68587d3d5ec70bb2cb29b570.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON T806 HRC</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2123" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_c320i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>83990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9dd/9ddce99b91f3c6c1c8af5869491cb8fd.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack C320i</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>США</country_of_origin>
</offer>
<offer id="2124" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_thx_55_pafers_edition/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b0b/b0baa866e9bcdcaa96e4a4a660813ab7.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON THX 55 PAFERS EDITION</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2125" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_plasma_iii_lc_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>91990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2db/2db8221616ef1e104b1b5f9f7b984308.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN PLASMA III LC HRC</name>
<description></description>
<manufacturer_warranty>5 лет бытовое / 1,5 года полукоммерческое</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2126" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_t507/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f33/f33232c4509c29ee6c5b8579e098feec.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON T507</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2127" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_elektricheskaya_royal_fitness_rf_1_f_52/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/dac/dacffb9176c6d81c146ff1312a884392.jpg</picture>
<vendor>Royal Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка электрическая Royal Fitness RF-1 (F-52)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2128" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_magma_ii_al_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/097/09713eedda4fef98bca7d4ed58153ea7.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN MAGMA II AL HRC</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2129" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_pro_form_pf_5_0_zlt/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/40a/40a7980cdf66a360491b7a40771b0b8d.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка PRO-FORM PF 5.0 ZLT</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2130" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_tesla_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>98890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/782/782ceae49ddf9892fcdd397bf8f7c5b9.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN TESLA HRC</name>
<description></description>
<manufacturer_warranty>5 лет бытовое / 1,5 года полукоммерческое</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2131" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_applegate_t20_a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35190</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/945/94515abb575ebc6219ef344d9ae323bc.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка APPLEGATE T20 A</name>
<description></description>
<manufacturer_warranty>Рама - 3 года, Двигатель - 2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2132" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_family_tm_300m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/972/9721b3286871a5d4a0e841495c064a72.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Family TM 300M</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2133" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_applegate_t10/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fe2/fe2541a13a9d360a443f2934ee082dfa.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка APPLEGATE T10</name>
<description></description>
<manufacturer_warranty>Рама - 3 года, Двигатель - 2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2134" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_yukon/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d92/d92827180e4d236883f185ce9fcda3cc.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON YUKON</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2135" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_oxygen_laguna_ii_al/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>45490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0e7/0e767f6ffa7ca5fc64a529b2d5c0837a.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка OXYGEN LAGUNA II AL</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2136" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_capri_t_103/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/88a/88ae8db2b8fde84357bec9009505b5cc.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC CAPRI T-103</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2137" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_ammity_pro_atm_7000/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>244990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9e4/9e42728410b4ebd873debff019500423.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка AMMITY PRO ATM 7000</name>
<description></description>
<manufacturer_warranty>2 + 1 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2138" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_t3x_05/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>649890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c25/c25623f72b34bcd4576cc63aa8b5c750.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка MATRIX T3X-05</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2139" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_t3x_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>629890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/980/980bd9b80116bfaeeab74a0649e3541f.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка MATRIX T3X (2013)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2140" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_bronze_gym_t900_pro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>258890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/795/79565b369d9f4710b764fe7801d8c792.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BRONZE GYM T900 PRO</name>
<description></description>
<manufacturer_warranty>3 года.</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2141" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_t3xe_2012/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>804890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f90/f90f30fe51acc3ddc3f65f42984abd46.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Matrix T3XE (2012)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2142" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_t1xe_va_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>689990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7d8/7d839ae58bf126e73c4f601fe31d1cb7.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка MATRIX T1XE VA (2013)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2143" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_t70xr/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>348890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1db/1db497e15e89c088b9ebbab7b77e8a2d.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка MATRIX T70XR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2144" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_t5x_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>949890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2f2/2f2c6d0bad451955c7bdf4c8e4fce255.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка MATRIX T5X (2013)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2145" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_tf50xir/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>309490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/99b/99b41de95439eac3e2b5f8597f874f12.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка MATRIX TF50XIR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2146" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_bronze_gym_t1100_pro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>339890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1c2/1c27744051895ac313bf5a969ede89b6.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BRONZE GYM T1100 PRO</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2147" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_xt485/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>136990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4eb/4eb3acee87e7cae54cced2b4e5edc4ed.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness XT485</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2148" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_bronze_gym_t800_lc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>144890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0a7/0a741c360a0af974f25b682120a1d1cd.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BRONZE GYM T800 LC</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2149" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_tf30xr/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>189490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/70d/70d8e155b0b5fdb3bd0e40a7d7409cfd.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка MATRIX TF30XR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2150" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_ct820/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>399990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ff6/ff60cd88b0a7c0fe1463f38b4b6af8ac.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness CT820</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2151" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_t7xe_va_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>1069890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/327/327295e5ec0af982e7545a0474ce4a91.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка MATRIX T7XE VA (2013)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2152" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_ct800/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>299990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7ea/7ea1a8cd28ce29fa0dd0e92ef6d93490.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness CT800</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2153" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_xt685_dc_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>179990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0ed/0ed38fe916d06a33d8b6ab775ed518ec.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness XT685 DC (2017)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2154" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_xt285/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>107990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e32/e328a030ecedb0fe97af5281e047cd0f.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness XT285</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2155" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_bronze_gym_t900_pro_tft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>299890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e9f/e9fd34b1979465acb5bcd1e0a2870cfc.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BRONZE GYM T900 PRO TFT</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2156" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_xt185/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>94890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e31/e316fc10b398ac69767657649f53673d.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness XT185</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2157" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_xt285_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>113790</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e8f/e8f4e8d8b6310878b990cca6c8717384.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness XT285 (2017)</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2158" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_t70xir/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>436890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b9e/b9ef45c5903790736fa701e57405c37b.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка MATRIX T70XIR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2159" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_bronze_gym_s900_promo_edition/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>298890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/735/735042bab0b3718564d0e1c29545c0cd.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BRONZE GYM S900 (Promo Edition)</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2160" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_lw1000/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>417990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4bd/4bd622b01ca8dbdfab988b2edaf40c12.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness LW1000</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2161" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_xt385_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>137990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5ec/5ec3e3372e5ca6122fea40254422ac98.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness XT385 (2017)</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2162" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_bronze_gym_s700_tft_promo_edition/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>384890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e81/e810e8fcca79dcf4096ed551dbd508eb.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BRONZE GYM S700 TFT (Promo Edition)</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2163" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_tf50xr/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>220890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b0b/b0bf6fb2df36b30e0f2c4bc197f1bad9.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка MATRIX TF50XR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2164" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_ct850/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>359990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/094/094e9059523837f3adc8ff13772b49fa.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness CT850</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2165" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_bronze_gym_t1000_pro_tft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>365890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8fb/8fbdd677939a4b995879bc3bab6e2213.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BRONZE GYM T1000 PRO TFT</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2166" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_t7xe_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>998890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/554/5543c2982f54f47e461aef9710583f6f.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка MATRIX T7XE (2013)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2167" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_xt185_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>92990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/220/2203ad3112803e827772bfe3054a09b4.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness XT185 (2017)</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2168" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_xt485_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>146990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/140/14050390a825644ae9e2fa49d9be03e2.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness XT485 (2017)</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2169" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_xt685_ac/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>194990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9fb/9fb4d3045d8d2ccdf4566d40d7142d33.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness XT685 AC</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2170" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_bronze_gym_s700_promo_edition/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>327890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0c9/0c989684da7de83d71f5e3d65f55fc3d.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BRONZE GYM S700 (Promo Edition)</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2171" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_ct850ent/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>518990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/69a/69af04aa11d211978545813f27542cac.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness CT850ENT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2172" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_ct900/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>411990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/aba/aba8e6a8b4f3100870b6ee1fb166a64a.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness CT900</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2173" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_t7xi_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>1099890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/528/5281310bc46c4ae9a602a3e1a5c5c8f8.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка MATRIX T7XI (2013)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2174" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_bronze_gym_t1000_pro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>286890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ad0/ad021f69224470aaa49f7c85ae795c69.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BRONZE GYM T1000 PRO</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2175" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_tf30xer/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>247890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/918/918a4a66fbd783f05515d59ffd6a0ea6.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка MATRIX TF30XER</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2176" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_xt385/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>147890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/aff/affbd986962ae0036b300c484adac7f2.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness XT385</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2177" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_bronze_gym_t801_lc_tft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>176890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d42/d42f44a316198db4ade440236e4d2830.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BRONZE GYM T801 LC TFT</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2178" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_impetus_zen_5800/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>299000</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6bc/6bcbb4c28323c740187549c784995c0e.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — IMPETUS ZEN 5800</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2179" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nautilus_t626/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>126900</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/319/319c5d77872255989578423a30ae0885.jpg</picture>
<vendor>Nautilus</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Nautilus T626</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2180" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_bronze_gym_s900_tft_promo_edition/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>357890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/63d/63d9d7289318250f3a1758421be0a166.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BRONZE GYM S900 TFT (Promo Edition)</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2181" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_ammity_classic_atm_520_tft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>97990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/233/233e9ac6988478e5be292441114edd6a.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка AMMITY Classic ATM 520 TFT</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2182" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovoy_trenazher_s_drive_performance_trainer/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>289890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f8f/f8f711fbcdfb820bd58ee7fd70a8e317.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговой тренажер S-DRIVE Performance Trainer</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2183" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_t1x_t1x_04/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>549890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/109/10914beeca77871df753cff8dadfbc23.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Matrix T1X (T1X-04)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2184" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_ammity_classic_atm_720_tft_ac/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>125000</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/29c/29cabebfc7216799fd382a29a03e0d75.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка AMMITY Classic+ ATM 720 TFT+ AC</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2185" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_spirit_fitness_ct900ent/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>537600</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/758/758449663f140629d1c45930331abb8c.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Spirit Fitness CT900ENT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2186" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_elektricheskaya_royal_fitness_rf_3_js_164041/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9c2/9c2c51752495bf9d8589d5d43fe6e774.jpg</picture>
<vendor>Royal Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка электрическая Royal Fitness RF-3 (JS-164041)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2187" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_impetus_it_4500/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/569/569bca1590ef6050e8d58ba604f7ed23.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — IMPETUS IT 4500</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2188" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_oslo_t_550/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>33990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/89a/89a8dc86cba43456be90a696e9a230ba.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC OSLO T-550</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2189" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_citta_tt5_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>77890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d38/d3886be3d810fd49044030d015715b9f.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Horizon CITTA TT5.0</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2190" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/elektricheskaya_begovaya_dorozhka_dlya_doma_evo_fitness_genesis/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>33990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e92/e929e9da671cb9be94faf57871f8c9aa.png</picture>
<vendor>EVO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Электрическая беговая дорожка для дома EVO FITNESS Genesis</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2191" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_ammity_style_atm_450/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>56990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b25/b254cd91ad499e9778f21da268436f4d.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка AMMITY Style ATM 450</name>
<description></description>
<manufacturer_warranty>2 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2192" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/myagkaya_begovaya_dorozhka_proxima_fleksa_et1506/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>65990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2c3/2c3f1d598a499a77ad29110b959f1c73.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Мягкая беговая дорожка PROXIMA FLEKSA, ET1506</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2193" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_boss_i_t_b1/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/aa0/aa0b77e32de3917d3cd587ec023f6c88.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC BOSS I T-B1</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2194" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_t7xi_t7xi_03/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>1198890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/dad/dadab3bce3a942e6ddcab443a5cc6ca0.png</picture>
<vendor>Xterra</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка MATRIX T7XI (T7XI-03)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2195" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_xterra_tr150/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31790</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/36e/36ed48c9ccbedddc3f3f27796a00e806.png</picture>
<vendor>Xterra</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Xterra TR150</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2196" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_suprim_t_600/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/93c/93ccf3d93db1df69772d919d6fe61686.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC SUPRIM T-600</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2197" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_enjoy_tm_6_35_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>62990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/732/7323f70aa2d0dcf20553be9789f59996.png</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit Enjoy TM 6.35 HRC</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2198" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_elek_body_sculpture_vt_3131s2/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23610</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/12f/12f7b9c69ab3915944a9c2cc27fa57aa.jpg</picture>
<vendor>BODY SCULPTURE</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка элек. BODY SCULPTURE ВТ-3131S2</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2199" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_boss_ii_t_b2/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9d1/9d19bb0b69b5a14a045b01b192e8b604.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC BOSS II T-B2</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2200" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dender_dinamast_dt_9087l/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7d7/7d7ed67514b74c4d6e91a51f45fc08b5.jpg</picture>
<vendor>Dender</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Dender Dinamast DT-9087L</name>
<description></description>
<manufacturer_warranty>24 месяца</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2201" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_laguna_t_250/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/378/3781e606539ef6c6beadf87f4cdda2c6.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC LAGUNA T-250</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2202" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_puerto_t_180/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>25490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b3a/b3a174160acd521cb19b25712284126f.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC PUERTO T-180</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2203" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/elektricheskaya_begovaya_dorozhka_dlya_doma_evo_fitness_etalon/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/750/750bc9c742e11052d2cbe6b166ac74f5.png</picture>
<vendor>EVO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Электрическая беговая дорожка для дома EVO FITNESS Etalon</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2204" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_elektricheskaya_body_sculpture_bt_3133/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26940</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3a4/3a4301706bf10869070fc1282d5ebc1b.jpg</picture>
<vendor>BODY SCULPTURE</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка электрическая BODY SCULPTURE BT-3133</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2205" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_strong_c3/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/81a/81a07ab7d716b6adc0bbc1abdf0545fb.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC Strong C3</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2206" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_family_tm_250m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6fa/6faed29716b23d3e57fb175746b3f043.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Family TM 250M</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2207" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_land_t_925a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>319990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/dab/dabc46608c25a7f9294b2f281434ffa8.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC LAND T-925A</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2208" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dender_lemans_plus/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>33990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/776/776e38bc172a5783c66c78a5521a6d72.jpg</picture>
<vendor>Dender</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Dender LeMans Plus</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2209" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_pro_form_530zlt/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39090</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4e9/4e91734f6fdad9df32fd53d22ef37651.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Pro-Form 530ZLT</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2210" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_pro_form_525_zlt/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>37990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/742/742dd3fbbc67dc2af88ef55485225f61.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка PRO-FORM 525 ZLT</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2211" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_hasttings_st80/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>70890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1b7/1b78287d749879df42290ce24e61a63c.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Hasttings СТ80</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2212" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_sienta_t625/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/70d/70d7fba3ebeacaf5a8ce9893d2e90b7a.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC SIENTA T625</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2213" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_sole_tt8_ac_2016/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>192000</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b34/b348480d0d431178092d4e9d90b29cd8.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Sole TT8 AC (2016)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2214" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dender_selecta/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>41990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/220/2202f1be5229b2bc3f3c87b73df9d1b1.jpg</picture>
<vendor>Dender</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Dender Selecta</name>
<description></description>
<manufacturer_warranty>узлы движения и электронные блоки – 6 мес., рама – 24 мес.</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2215" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_xterra_tr180/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f2f/f2fe270f802f2402760d152bc7a2560a.png</picture>
<vendor>Xterra</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Xterra TR180</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2216" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_ammity_style_atm_450a_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>62990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a91/a9161ff50a9e78c62bd6f05a58131ab0.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка AMMITY Style ATM 450A HRC</name>
<description></description>
<manufacturer_warranty>2 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2217" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_roma2_t_500_2/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/337/337c5acff1b9abf535b25b9bff0c085d.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC ROMA2 T-500/2</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2218" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_land_pro_t_925b/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>349990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b30/b30a0e9d651c6d6c8f8a7c788b53a878.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC LAND Pro T-925B</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2219" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_enjoy_tm_7_35_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/629/629ecbd48e3e2f06f099c867244bb0d3.png</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit Enjoy TM 7.35 HRC</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2220" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_it_4200/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9a5/9a50c81ae8446691d7362f66ecc28dad.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit IT 4200</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2221" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_pro_form_perfomance_600i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d99/d996bc9e463a475179f36e468a6fe651.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Pro-Form Perfomance 600i</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2222" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_premio_t730/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>47990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/018/018ad5973b0d9d24fe90b02c08eb2d6f.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC PREMIO T730</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2223" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_it_4250/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/11d/11dd4606a504bb4c1b9ba4babdd8e3f2.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit IT 4250</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2224" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dender_panamax_t_1198/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1c4/1c4e4fd1476d27e3e7695a179f7cdce7.jpg</picture>
<vendor>Dender</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Dender Panamax T-1198</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2225" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_elektricheskaya_body_sculpture_vt_5807/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35170</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/679/679813085401e246fab8676ea7c9685e.jpg</picture>
<vendor>BODY SCULPTURE</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка электрическая BODY SCULPTURE ВТ-5807</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2226" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_rainbow_rt_18_bmh/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>44990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/613/61314c793716b1f1acf3c0b00455f237.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit Rainbow RT 18 BMH</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2227" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_new_t23_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>129990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/732/7325036f2260fad8176fdd11273e6ace.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack NEW T23.0</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2228" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_it_4600/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bec/becc03215811b7c1a53cf28379cbfdad.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit IT 4600</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2229" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dender_alba/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/901/9018aa845693e01710b661370b4138a5.jpg</picture>
<vendor>Dender</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Dender Alba</name>
<description></description>
<manufacturer_warranty>узлы движения и электронные блоки – 6 мес., рама – 24 мес.</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2230" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_hasttings_st100/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>79990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/119/119e81e16e9cc077e317e37690646898.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Hasttings СТ100</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2231" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_omega_t_130/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5c5/5c50990715c9f2cd50c7e410b1366adb.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC OMEGA T-130</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2232" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/elektricheskaya_begovaya_dorozhka_dlya_doma_evo_fitness_vector/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>25990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7be/7be37a58d30f3e4dd8ac04ee79447e17.png</picture>
<vendor>EVO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Электрическая беговая дорожка для дома EVO FITNESS Vector</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2233" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_ammity_space_atm_5000/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>495000</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4fe/4fe4b5f3ef4339434c675139d4293f73.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка AMMITY SPACE ATM 5000</name>
<description></description>
<manufacturer_warranty>2 + 1 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2234" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_svensson_industrial_go_t65/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>189990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f50/f50aabf21e35124fc436813112206c4e.png</picture>
<vendor>Svensson Industrial</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка SVENSSON INDUSTRIAL GO T65</name>
<description></description>
<manufacturer_warranty>Рама - , Двигатель -</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2235" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_optima_fitness_sigma_tft_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>45900</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6db/6db5c0b436568ecd7436812d14b3f4a6.jpg</picture>
<vendor>Optima Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Optima Fitness Sigma TFT (2017)</name>
<description></description>
<manufacturer_warranty>2 года - на электронные компоненты, 5 лет - на раму</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2236" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_it_4900/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>73990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f5b/f5b5cf33fc5e7ac5e47f73cb9a5bb3ea.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit IT 4900</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2237" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_t_8_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>102890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d1a/d1a2976934c187cef58ba0769915ce2d.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка HORIZON T-8.0</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2238" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_svensson_industrial_force_t75/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>219990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/28c/28cb40f9fc09839db9e7b72ded16eb21.png</picture>
<vendor>Svensson Industrial</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка SVENSSON INDUSTRIAL FORCE T75</name>
<description></description>
<manufacturer_warranty>Рама - , Двигатель -</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2239" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_lifespan_tr7000i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>455000</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6bf/6bf680d38254cd5da9fdca5a8f513cfb.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — LifeSpan TR7000i</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2240" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_lifespan_tr8000i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>520000</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7e1/7e194f25b1ad80b99d049e11cd44fdd4.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — LifeSpan TR8000i</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2241" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_pro_form_perfomance_400i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2a9/2a9347e3ecf1bb4f48951f9ab2110e62.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Pro-Form Perfomance 400i</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2242" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_rainbow_rt_480/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>82990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/097/09748a979c4a5063e87be845246dd6c2.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка - Clear Fit Rainbow RT 480</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2243" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_bronze_gym_t812_lc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>129890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/23d/23d6bddd4224911f430ebaf84dcde1e6.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BRONZE GYM T812 LC</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2244" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_pro_form_perfomance_350i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/881/881f5586e43fc82119bb80dc421aac9f.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Pro-Form Perfomance 350i</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2245" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dender_atrium_t_1197/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>46990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5d6/5d61eb184aa8d63194a4cece751d269e.jpg</picture>
<vendor>Dender</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Dender Atrium T-1197</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2246" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_verona_t_400/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4a6/4a663313b01d6bbdd7e30287ff8bf047.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC VERONA T-400</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2247" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_elektricheskaya_body_sculpture_bt_3146/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23570</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0a6/0a6d6addaaff5bc13449b748de462c89.jpg</picture>
<vendor>BODY SCULPTURE</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка электрическая BODY SCULPTURE BT-3146</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2248" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_tempo_t85/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>56890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4af/4af1b2fe25d7150056a1995fc5284ae6.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Horizon Tempo T85</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2249" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_m680/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4df/4dfa8ab79548b94541f41be1b78f98dc.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC M680</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2250" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_bronze_gym_t802_lc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>109890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3a4/3a4cb9860ed132409b1647bae1031eda.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BRONZE GYM T802 LC</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2251" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dender_lemans/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/83c/83c63e906c6256d20d7dd169f388b3ae.jpg</picture>
<vendor>Dender</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Dender LeMans</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2252" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_latina_t_2001/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a1f/a1f62ab4df71508e4a3503164f510c16.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC LATINA T-2001</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2253" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_mamba_t_150/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/746/746689ffbd29ba3bfae2e321f9114b90.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC MAMBA T-150</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2254" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/krosstrener_pro_form_power_1295i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>89990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/259/259a9fad1edb9027444358f3d87be9c8.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Кросстренер Pro-Form POWER 1295i</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2255" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_enjoy_tm_8_35_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>75990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f6c/f6cbb99342d3221506b30741364b4314.png</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit Enjoy TM 8.35 HRC</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2256" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_family_tm_510a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>68990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b6f/b6f240a60a748685f6dd74df12ecc7a5.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Family TM 510A</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2257" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_optima_fitness_sigma/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59780</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e2f/e2f4e2d853cbaaf95a5125ee30b30c9d.jpg</picture>
<vendor>Optima Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Optima Fitness Sigma</name>
<description></description>
<manufacturer_warranty>2 года - на электронные компоненты, 5 лет - на раму</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2258" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/elektricheskaya_begovaya_dorozhka_dlya_doma_energetics_pr_4900p_e_z/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>37890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/340/340618820420331844eb68ccf2f1cbce.jpg</picture>
<vendor>Energetics</vendor>
<vendorCode></vendorCode>
<name>Электрическая беговая дорожка для дома ENERGETICS PR 4900P E-Z</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2259" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_optima_fitness_solo/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>40250</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0ea/0ea891886be1462e10747ede2ed03b93.jpg</picture>
<vendor>Optima Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Optima Fitness Solo</name>
<description></description>
<manufacturer_warranty>2 года - на электронные компоненты, 5 лет - на раму</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2260" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_svensson_industrial_omega/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/058/0587664c95955532e02a3579269d75dd.png</picture>
<vendor>Svensson Industrial</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка SVENSSON INDUSTRIAL OMEGA</name>
<description></description>
<manufacturer_warranty>Рама - , Двигатель -</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2261" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_focus_t_4607/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/078/078ec78e44ba0dfccdde38bef17d8985.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC FOCUS T-4607</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2262" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_rainbow_rt_18_wmh/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bf8/bf8e16dd7e7dc51838d4981cc2098596.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit Rainbow RT 18 WMH</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2263" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_sole_f60_new/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59400</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fcf/fcfee781a5c7cd7638055777f6ff9134.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Sole F60 NEW</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2264" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_laufstein_profi/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>89990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a69/a691c94b01137a3220dbbe4140bb73d0.jpg</picture>
<vendor>LAUFSTEIN</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка LAUFSTEIN PROFI</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2265" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_sole_tt8_2016/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>174900</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c2f/c2fb21b4ee70f8f444c3f42ba90642b7.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Sole TT8 (2016)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2266" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_bh_fitness_f1/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>79990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c66/c66401c0028a29f2ac0795b3b503bdf3.jpg</picture>
<vendor>BH FITNESS</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BH FITNESS F1</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2267" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_rainbow_rt_540/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>92990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a8f/a8f05d55eb66bbec6e7380808b275e1b.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка - Clear Fit Rainbow RT 540</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2268" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_t_460_sura/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>45990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ea0/ea0e8ed1588971f4af9e56eb511cde22.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC T-460 SURA</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2269" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_adventure_5_viewfit/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>107990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8ef/8ef19b5c1b5207eaf0ccb301d04acf60.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Horizon Adventure 5 VIEWFIT</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2270" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_energetics_pr_2_9_elite/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b7e/b7e769090ead8a36ada2a4700271cefb.jpg</picture>
<vendor>Energetics</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка ENERGETICS PR 2.9 ELITE</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2271" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_adventure_7_viewfit/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>120990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/219/2192d957e7c16b57a537564e9f3c087b.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Horizon Adventure 7 VIEWFIT</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2272" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_corsa_t_120/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0ec/0ec1300e4a9c0e58138c0bbae39b73a5.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC CORSA T-120</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2273" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_vision_t80_elegant/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>312890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f06/f06a56e049569acd6433fc19055bc376.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка VISION T80 ELEGANT</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2274" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_laufstein_mercury/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>44990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/96f/96f1ec03bac84fdb297b70d470745d18.jpg</picture>
<vendor>LAUFSTEIN</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка LAUFSTEIN MERCURY</name>
<description></description>
<manufacturer_warranty>2 года, рама 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2275" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_vision_t80_classic/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>275890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8d9/8d96e53876449d6d36a08330a24328e1.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка VISION T80 CLASSIC</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2276" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_sole_f60/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>74900</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/665/6654fc58c020ad1d1742f0f6ddff357e.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Sole F60</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2277" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_laufstein_corsa_automatik/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>37990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b94/b94102c8e96a6545d59f1d5d832118c2.jpg</picture>
<vendor>LAUFSTEIN</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка LAUFSTEIN CORSA AUTOMATIK</name>
<description></description>
<manufacturer_warranty>2 года, рама 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2278" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_rainbow_rt_18_cmh/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/480/480e974518018c8761e523a6c4af2275.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit Rainbow RT 18 CMH</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2279" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_camry_t_105o/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/704/704aaf16e979ce0026f0782847849d19.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC CAMRY T-105O</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2280" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_ammity_classic_atm_518_tft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>89990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d5c/d5ce4d3ea3931e6d427c5ff822276c4b.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка AMMITY Classic ATM 518 TFT</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2281" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_t656/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>45990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bb0/bb074eafa1adea120b50a6511c0f7cea.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON T656</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2282" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_camry_t_105b/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/886/88683f17d6829b6325b1c6fb22ac0b2d.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC CAMRY T-105B</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2283" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_commercial_2950/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>179990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/592/592cd037ea462e05e5f4387e829e5cba.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack Commercial 2950</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2284" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_optima_fitness_prima_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>33900</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e0f/e0f24f34557576589751c0a8b6eea347.jpg</picture>
<vendor>Optima Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Optima Fitness Prima (2017)</name>
<description></description>
<manufacturer_warranty>2 года - на электронные компоненты, 5 лет - на раму</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2285" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_t16_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>109990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/637/637e6dd4efd4f77a639de4884f34efda.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack T16.0</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>США</country_of_origin>
</offer>
<offer id="2286" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_family_tm_100/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/597/59733c3c8f7bbfef354c7241b0f90e40.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Family TM 100</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2287" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_laufstein_orion/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/059/05922604f70d442ea4a83f7f6018b95f.jpg</picture>
<vendor>LAUFSTEIN</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка LAUFSTEIN ORION</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2288" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_proform_730zlt/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>55990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bab/bab45c2bc066bc2bc8bd94e37130db45.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка ProForm 730ZLT</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2289" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_hasttings_fx400/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>65590</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d06/d061490dcae6327daa14ea8b2d0a7a50.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Hasttings FX400</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2290" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_t17_5/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>94990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d5b/d5b77a0860827909f3313e983ba3ccc3.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack T17.5</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2291" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_optima_fitness_sigma_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39900</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/299/29996ba3e70f4704c3005cd61484cc75.jpg</picture>
<vendor>Optima Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Optima Fitness Sigma (2017)</name>
<description></description>
<manufacturer_warranty>2 года - на электронные компоненты, 5 лет - на раму</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2292" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_family_tm_200m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0a2/0a2259ef6ad94f7db5f5c94d6a44f385.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Family TM 200M</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2293" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_t12_2/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>79990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7f3/7f308ac937b6eb0e55709bbb83f8b34b.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack T12.2</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2294" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_elite_t7_1/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>174890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a08/a0827e6bae599e76344b4cf797afb67b.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Horizon Elite T7.1</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2295" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_adventure_cl/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>77490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/960/960b4adb2632616839c83f512810e192.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Horizon Adventure CL</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2296" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_t20_5/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>139990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/80d/80debdd19b6902b83afb8b30a0a983f5.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack T20.5</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>США</country_of_origin>
</offer>
<offer id="2297" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_energetics_power_run_1_8/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27690</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4c7/4c79a4ea676e794d0930f070e740eaeb.jpg</picture>
<vendor>Energetics</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка ENERGETICS Power Run 1.8</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2298" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_elite_5000/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>199990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8be/8be55f465cee2fd30e3211709c5022fc.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack Elite 5000</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2299" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_adventure_cs/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>72690</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a9d/a9d024df25cc139f0a012515a964a7e8.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Horizon Adventure CS</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2300" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_js_3643/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>43990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e09/e0948a6c0624383b20236a4afad66c31.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC JS-3643</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2301" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_t22_5/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>149990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/740/74052689a5f4955609a591990718c04c.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack T22.5</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>США</country_of_origin>
</offer>
<offer id="2302" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_proform_performance_1450/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>79990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/de9/de94fdb56f72f71049bebe0aad493fa2.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка ProForm Performance 1450</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2303" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_t_420_lega/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/dad/dad87122dcb68faa3379f142a41a1d62.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC T-420 LEGA</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2304" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_t_4101_lotos/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d90/d9097ddc11b49c1fb12e4316531bdf03.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC T-4101 LOTOS</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2305" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_t13_5/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>79990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6de/6dee80aba2d20a9d5a3ed9219575b52d.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack T13.5</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2306" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_js_3645/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>45990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0da/0da84435c8352f61935be08b26bc211f.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC JS-3645</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2307" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_c1650/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>119990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/30e/30e7840cf462b86273043c9214846b53.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack C1650</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2308" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/krosstrener_pro_form_power_995i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>79990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fd6/fd6cf2d935653aa73a31110cc0bdf50e.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Кросстренер Pro-Form POWER 995i</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2309" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_sole_f85_2016/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>133800</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/158/15885061fc3ed46d9c98ef1cafb746cc.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Sole F85 (2016)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2310" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/elektricheskaya_begovaya_dorozhka_dlya_doma_basic_fitness_t670/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>42990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/112/112d07acd3fa3facee3d048244c1afa1.jpg</picture>
<vendor>Basic Fitness</vendor>
<vendorCode></vendorCode>
<name>Электрическая беговая дорожка для дома BASIC FITNESS T670</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2311" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_enjoy_tm_8_25/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>72990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a6e/a6e6d731c2221e139542d6d671acbb0d.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit Enjoy TM 8.25</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2312" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_basic_fitness_t670/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>42990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/faf/faf45463c441533b7628decc649b859d.jpg</picture>
<vendor>Basic Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BASIC FITNESS T670</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2313" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_adventure_3_viewfit/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>91490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/54e/54e2713b154138fff61e5d6437e4423d.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Horizon Adventure 3 VIEWFIT</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2314" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_vision_t80_touch/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>333890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ed6/ed646be020c4e1260d386720271903f9.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка VISION T80 TOUCH</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2315" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_optima_fitness_solo_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26900</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/496/49609afd733dec44f4254c263cf9bc4e.jpg</picture>
<vendor>Optima Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Optima Fitness Solo (2017)</name>
<description></description>
<manufacturer_warranty>2 года - на электронные компоненты, 5 лет - на раму</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2316" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_sole_f63_2016/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>95700</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/765/765473f04c8d4367a41fe22276581fef.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Sole F63 (2016)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2317" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_enjoy_tm_5_25/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>41990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a80/a808a84f816c89b4a72e57ba96b154c8.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit Enjoy TM 5.25</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2318" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_c990/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3e9/3e9cdde991d9b377b8a134dff33ced1e.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack C990</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2319" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_sole_f65_2016/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99900</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/046/0463a8d23b462a883acafcf14da4b01e.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Sole F65 (2016)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2320" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_enjoy_tm_4_25/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b5b/b5ba55d5ed63b476629155d4801f7a3c.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit Enjoy TM 4.25</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2321" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_commercial_2450/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>139990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/353/3534f26f3b333cc3b78c8d805009a750.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack Commercial 2450</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2322" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_hasttings_tr660/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/222/222f3051d6fab433c8a9e00433871140.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Hasttings TR660</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2323" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_hasttings_tr300/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>74990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e08/e0862cff611659d9a16f4052326acaf7.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Hasttings TR300</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2324" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_enjoy_tm_6_25/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/691/6919f311009a4118f3c79f0fceab45c0.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit Enjoy TM 6.25</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2325" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_energetics_power_run_3200p/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>25890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4f6/4f6bdeadcfb779cd7eb5a880b0d2cc93.jpg</picture>
<vendor>Energetics</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка ENERGETICS Power Run 3200p</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2326" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_strong_c4/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>33990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/66d/66d941468e4160c2d3d026dc2d44a847.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC Strong C4</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2327" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_optima_fitness_compact/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>38920</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/db8/db8156f9ad6678ecb18674b7225d2a32.jpg</picture>
<vendor>Optima Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Optima Fitness Compact</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2328" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_terra_t_505/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8c6/8c67cb4a0c7a134da921b5dfbb855692.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC TERRA T-505</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2329" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_family_tm_400a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>43990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a8f/a8f95bd8a11c6ee6aacf3f64e5ebb11e.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Family TM 400A</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2330" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_strong_c2/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/acf/acf968252610ea5e39e5387c97e4253c.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC Strong C2</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2331" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_basic_fitness_t660i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1cd/1cd12de95fa64e8b442145c7fbca221c.jpg</picture>
<vendor>Basic Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BASIC FITNESS T660i</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2332" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_sole_f63/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>85900</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3bd/3bda1520b0926711642dffd5f8196b4f.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Sole F63</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2333" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_vision_tf20_elegant/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>237890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/31a/31a360df7b0d33558db6f918d0906c57.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка VISION TF20 ELEGANT</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2334" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_incline_trainer_x9i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>159990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9eb/9eb4bf32952c1ef12f46aa34448bcb2d.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack Incline Trainer X9i</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2335" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_t7_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>64990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/030/0308de569692c8ae3866afd8764cc7eb.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack T7.0</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2336" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_t556/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>37890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e56/e56666a3f5a301343bd07252ab04837f.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON T556</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2337" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_c500/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>92990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5db/5dbca5051836a24903e17f9cb1c1a8ee.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NORDICTRACK C500</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>США</country_of_origin>
</offer>
<offer id="2338" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_diamond_fitness_audio_1_9/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b5c/b5cf5e3b80ec768421da250e18ef8dba.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Diamond Fitness Audio 1.9</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2339" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_t9_2/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9e5/9e55694b5b6f77a2d3cadd229f2b3053.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack T9.2</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2340" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_hasttings_lct80/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>79990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8a2/8a2ab9c0d9398bd585054b42d8d76dc5.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Hasttings LCT80</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2341" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_family_tm_450a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>53990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/755/755c3fc70a2cf546d41602cd4149d877.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Family TM 450A</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2342" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_enjoy_tm_7_25/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>65990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/17c/17c401208972736fe839d31dc0dc6a58.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit Enjoy TM 7.25</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2343" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_elite_1500/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>119990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/299/2994ba73d1b9b03fddd46d94c297bf6b.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack Elite 1500</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2344" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_laufstein_prisma/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f0e/f0e323ad29178231377d17299aa2f5d0.jpg</picture>
<vendor>LAUFSTEIN</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка LAUFSTEIN PRISMA</name>
<description></description>
<manufacturer_warranty>2 года, рама 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2345" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_m585/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c07/c070c3af4660168eb64e8a2d1f921cc5.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC M585</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2346" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_laufstein_corsa/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4f8/4f80c1a31ff08a5e5d52af6504615030.jpg</picture>
<vendor>LAUFSTEIN</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка LAUFSTEIN CORSA</name>
<description></description>
<manufacturer_warranty>2 года, рама 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2347" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_elite_t5_1/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>149890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/55c/55c82a696f5f83b83186ab4e09f48f46.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Horizon Elite T5.1</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2348" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_commercial_1750/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>129990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4b2/4b28784498ba8155ed42be750a410f7c.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack Commercial 1750</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2349" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_hasttings_silver_ii/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c51/c5140294734161abcb5bf9f9d15b2529.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Hasttings Silver II</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2350" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_c300/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>75990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9df/9dfd2a507371d1b27af2e49dfcafd3f4.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack C300</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2351" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_vision_tf20_classic/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>199890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d85/d85d8e6c6b8cceefd463f4d21148ea9c.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка VISION TF20 CLASSIC</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2352" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_vision_t40_touch/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>308890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1f7/1f7b42a634d55db3cbb95b1aaab97c5f.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка VISION T40 TOUCH</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2353" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_m80/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c70/c70a76276462dcb85a8e205fba7ccf0a.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC M80</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2354" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_t651e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>44490</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b4a/b4adc223b6b7e65d0c46c7f480d8d710.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON T651E</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2355" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_vision_t40_classic/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>232890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3c5/3c511b8fd4d20e321745eecadfa781c9.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка VISION T40 CLASSIC</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2356" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_vision_tf20_touch/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>275890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c80/c808e588200c287935764f46b0c2f75e.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка VISION TF20 TOUCH</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2357" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_strong_c1/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>25990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0f1/0f180b6f04784b7ab1fe51083c54d082.png</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC Strong C1</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2358" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_elite_t5000_2011/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>134890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/038/038d05a8d244894ae3d6fee76a34b58a.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Horizon Elite T5000 (2011)</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2359" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_basic_fitness_t660/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>30990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/358/3588ad7331bb2fd213420260b4c09df3.jpg</picture>
<vendor>Basic Fitness</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка BASIC FITNESS T660</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2360" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_m90/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/59f/59fbf4a3b9864e37504858021462c4aa.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC M90</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2361" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_elite_2500/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>134990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8c4/8c456465062136ed3e8fdc3c7c0d8bd1.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack Elite 2500</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2362" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_clear_fit_eco_et_16_ai/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>57990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/60e/60e052c3a85013759721f415e00cd7d7.png</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка — Clear Fit Eco ET 16 AI</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2363" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_adventure_1_plus/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59690</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ed5/ed56f179cdef8c25d42b10a941e1b95e.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Horizon Adventure 1 Plus</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2364" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_hasttings_evok_ii/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31690</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/975/975aadbdc460cb3f4b8ad761579d9fbf.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Hasttings Evok II</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2365" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_stella_t_1000/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c51/c519b79fed23a3419709376f081121b4.png</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC STELLA T-1000</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2366" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_elite_t4000/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>139190</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/693/69327e67c18622249b392f1a7b032a3a.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Horizon Elite T4000</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2367" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_aruba_t_4008/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/73d/73d73ba7a8010324670d9299ba010d1d.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC ARUBA T-4008</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2368" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_family_tm_400m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e27/e27c8e9f6d578a3c93bb05af3d0a4374.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Family TM 400M</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2369" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_elite_t3000/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>119890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/73d/73dbae03b50bd0466c0cba4a6aef036a.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Horizon Elite T3000</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2370" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_c200/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>62990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5ee/5ee537d26583dfd3d54308cbdd25c22a.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack C200</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2371" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_t_pro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>191890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/57b/57b8279663873cfd1494d2be24949cd8.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка HORIZON T-PRO</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2372" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_evolve_plus/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9b7/9b767a59c183a9ba873acb5b4f7a483d.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Horizon Evolve Plus</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2373" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_vision_t60/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>269890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c39/c39136e21661f1d20017f1c3b2819675.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка VISION T60</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2374" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_horizon_adventure_4_plus/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>93990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2b6/2b6dbec2429c092d8c761b52437d610c.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка Horizon Adventure 4 Plus</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2375" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_c100/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/36e/36ee1f4e8b815da0d377835182705bc7.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack C100</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2376" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_t606/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/95b/95babbaa6a32f3ffa3b615960630cdc8.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON T606</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2377" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_c80i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b8d/b8d420c92dc0479de232aa9713c8b5f0.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack C80i</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2378" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_nordictrack_elite_4000/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>169990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e04/e044851aa0642850e295a096c64d12df.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка NordicTrack Elite 4000</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2379" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_t756_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>51990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f95/f95822eaa86bbad3223094edfd5b1199.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON T756 HRC</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2380" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_carbon_t406/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28390</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/52d/52d11e1e81353cb3894aaad525d1a818.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка CARBON T406</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2381" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_matrix_t3xe_va_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>1022890</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/039/039df2da01682b41fed81f520bfc141d.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка MATRIX T3XE VA (2013)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2382" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_smart_t_280/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9f6/9f6828afaa55d4ab0d6c02973bcb8eeb.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC Smart T-280</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2383" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_elektricheskaya_sport_elit_se_1608e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15260</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0ac/0ac37463bcbdf6ebcf3606b46a3708ff.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка электрическая SPORT ELIT SE-1608E</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2384" available="true">
<url>http://sportzastava.ru/catalog/begovye_dorozhki/begovaya_dorozhka_dfc_roma_t_500/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26990</price>
<currencyId>RUB</currencyId>
<categoryId>154</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e01/e01ffb2c8c85afe30e0f7c67dc19a336.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Беговая дорожка DFC ROMA T-500</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2385" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_oxygen_ex_45fd_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>56890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c14/c1463f20ae2c7c3445cf6f54673afdca.jpg</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр OXYGEN EX-45FD HRC+</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2386" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_oxygen_ex_55fd_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>60690</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/642/64273d5872d3cbac0712cda487d11429.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр OXYGEN EX-55FD HRC+</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2387" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_proxima_furia_ipro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>56990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9f6/9f655252bb47777e58342b2e5e304fb4.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер PROXIMA FURIA iPRO</name>
<description></description>
<manufacturer_warranty>2 года. Рама, маховик - 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2388" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_aero_ae_510/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5fe/5fe773ba4090b9dec686fe3ac4545a52.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Aero AE 510</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2389" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_oxygen_gx_65fd_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>67890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fa7/fa778c4ce123bba2aeceec7b32531095.jpg</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр OXYGEN GX-65FD HRC+</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2390" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_aero_ae_402/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/dc2/dc299b4dbf6acd92e467e0e10d0ec9e7.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Aero AE 402</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2391" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_proxima_gladius_ipro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c3b/c3b6a25bf5fb5b2b538772a7e0954dbe.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер PROXIMA GLADIUS iPRO</name>
<description></description>
<manufacturer_warranty>2 года. Рама, маховик - 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2392" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_svensson_body_labs_comfortline_enm/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9d9/9d9768ad86950ad58f1df79b88f120e8.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер SVENSSON BODY LABS COMFORTLINE ENM</name>
<description></description>
<manufacturer_warranty>Рама - 1,5 года, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2393" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_proxima_veritas_ipro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>52990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f50/f5048a4654429a0af0ac894b7f549e4b.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер PROXIMA VERITAS iPro</name>
<description></description>
<manufacturer_warranty>2 года. Рама, маховик - 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2394" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_svensson_body_labs_strideline_ezm/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/40d/40d8906ec3afeae37a264f525d6ec067.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер SVENSSON BODY LABS STRIDELINE EZM</name>
<description></description>
<manufacturer_warranty>Рама - 1,5 года, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2395" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_svensson_body_labs_comfortline_esm/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>25490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/903/903e6da8809e43aecfa1a340561e20e9.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер SVENSSON BODY LABS COMFORTLINE ESM</name>
<description></description>
<manufacturer_warranty>Рама - 1,5 года, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2396" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_adidas_x_16/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>52990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/cc9/cc9bf66e5f4530df9962ec298efb8791.jpg</picture>
<vendor>Adidas</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер ADIDAS X-16</name>
<description></description>
<manufacturer_warranty>2 года.</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2397" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_oxygen_ex_35fd_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>46890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/adf/adf867fcc5fc1f2008af4fd8472e30fb.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр OXYGEN EX-35FD HRC+</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2398" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_svensson_body_labs_strideline_eza/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>41990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bf2/bf2fd4bd1d14bc514967b10a26a6fc17.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер SVENSSON BODY LABS STRIDELINE EZA</name>
<description></description>
<manufacturer_warranty>Рама - 1,5 года, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2399" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_oxygen_cariba_iii_el_ext/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/dac/dac299682980995b5adeec49ec89503a.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер OXYGEN CARIBA III EL EXT</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2400" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_proxima_serenada_ipro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>42990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/201/201ff7845c045e7bed94ae75966cc24a.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер PROXIMA SERENADA iPRO</name>
<description></description>
<manufacturer_warranty>2 года. Рама, маховик - 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2401" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_proxima_latina/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/448/4487bd3cb37ca845398375fbceb30eee.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер PROXIMA LATINA</name>
<description></description>
<manufacturer_warranty>2 года. Рама, маховик - 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2402" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_carbon_e704/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d1b/d1b07001fb4eeaccdb094e054930426f.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр CARBON E704</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2403" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_dream_de_30/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>98000</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f42/f427cd196f9bb4ce5e7b0b8cfb733b4e.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Dream DE 30</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2404" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_dream_de_50/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>114000</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/975/975438d1d43de0df604d02b1d3878833.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Dream DE 50</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2405" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_applegate_e32_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/12f/12fdc35434e019e1cda58e3ba442012f.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер APPLEGATE E32 M</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 0,5 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2406" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_svensson_body_labs_frontline_rta/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7a9/7a9719e7251884bd782a43bddb2fe0f6.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер SVENSSON BODY LABS FRONTLINE RTA</name>
<description></description>
<manufacturer_warranty>Рама - 1,5 года, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2407" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_applegate_e32_a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3ef/3ef8f0c8dc02811a058c4677c90a9c41.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер APPLEGATE E32 A</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 0,5 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2408" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_applegate_e22_a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f4d/f4d6eb9f5cf3dc363acbab9ffe035b36.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер APPLEGATE E22 A</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 0,5 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2409" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_applegate_e42_a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b9b/b9b6e5f4233113026526ae73445c27af.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер APPLEGATE E42 A</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 0,5 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2410" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_proxima_senator/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>96990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9c0/9c09999f6c1cd44e34be75e207d92b96.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер PROXIMA SENATOR</name>
<description></description>
<manufacturer_warranty>Г2 года. Рама, маховик - 5 летарантия</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2411" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_proxima_latina_ii/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>44990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a23/a235f0d3f9fd01842e7d32be925c9534.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер PROXIMA LATINA II</name>
<description></description>
<manufacturer_warranty>2 года. Рама, маховик - 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2412" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_carbon_e804/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d29/d29117698c9c31a8bace91741ed3e542.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр CARBON E804</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2413" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_carbon_e907/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>33890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5a7/5a7d2e7068297951f0dab63147911858.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр CARBON E907</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2414" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_oxygen_columbia_ext/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34190</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/410/410cf456369dc8632fba1e761e7e1ac3.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр OXYGEN COLUMBIA EXT</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2415" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_svensson_body_labs_comfortline_ena/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bd6/bd6d243e18e3b16be37feed90ddf5a6d.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер SVENSSON BODY LABS COMFORTLINE ENA</name>
<description></description>
<manufacturer_warranty>Рама - 1,5 года, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2416" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_oxygen_peak_e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8c6/8c6d90aac1fac508046d6214c9f2139d.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер OXYGEN PEAK Е</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2417" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_svensson_body_labs_comfortline_esa/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер SVENSSON BODY LABS COMFORTLINE ESA</name>
<description></description>
<manufacturer_warranty>Рама - 1,5 года, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2418" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_applegate_e22_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>25990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/378/3782df60df35b3a18afeae250d4d6fed.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер APPLEGATE E22 M</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 0,5 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2419" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_carbon_e100/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/025/02516689364914a29e980b17ffbf08a7.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер CARBON E100</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2420" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_proxima_maximus_ipro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>75990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d61/d61d9288f79e2088881167abbcc56f8a.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер PROXIMA MAXIMUS iPRO</name>
<description></description>
<manufacturer_warranty>2 года. Рама, маховик - 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2421" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_oxygen_alabama_ext/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/206/20673096fee9ffcbdef2104800031752.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер OXYGEN ALABAMA EXT</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2422" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_oxygen_ex_55/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>57690</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d49/d49765b5b5dba05c344352e333b752eb.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр OXYGEN EX-55</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2423" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_oxygen_gx_65/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>63890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/307/3072d7cff877e7a7fe4bf8f11234f469.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр OXYGEN GX-65</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2424" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_proxima_enima_ii_ipro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/433/4337f71c781e145a38cff93673b8652f.png</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер PROXIMA ENIMA II iPRO</name>
<description></description>
<manufacturer_warranty>2 года. Рама, маховик - 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2425" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_oxygen_ex_45/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>53890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/75f/75fea2a2800460107ec6dc2efd49aa2a.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр OXYGEN EX-45</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2426" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_oxygen_satori_el_hrc_ext/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0eb/0eb2ca9a0b1f64104589f87b7ac95ac1.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр OXYGEN SATORI EL HRC EXT</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2427" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_applegate_x22_a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/afa/afafb8f59065eebfd3bbc5a6d9d208f0.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер APPLEGATE X22 A</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 0,5 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2428" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_carbon_e304/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a35/a3515c2cc0f274926da1d49728a5de70.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер CARBON E304</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2429" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_carbon_e407/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d3a/d3a8454c69bd3d3575d8736ccf094dbb.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер CARBON E407</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2430" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_oxygen_ex_35/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>43890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b78/b78c007c986cb243542c8a94fe1e605a.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр OXYGEN EX-35</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2431" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_proxima_panda/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/891/891359215bf80139ff06277f7d22e70e.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер PROXIMA PANDA</name>
<description></description>
<manufacturer_warranty>2 года. Рама, маховик - 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2432" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_carbon_e200/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15690</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/010/01091634fefef034eb162f38d503b4ed.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер CARBON E200</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2433" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_oxygen_tornado_ii_el/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/81b/81bab7e6d505b1f50e6adec1efb8a0ab.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер OXYGEN TORNADO II EL</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2434" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_e1x_e1x_02/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>313490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d77/d77f621c216402bddd5497dc86fbd9a0.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр MATRIX E1X (E1X-02)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2435" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_e5x_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>498890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/325/3250e68783f312715acca337bec62ae6.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Matrix E5X (2013)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2436" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_e3x_e3x_04/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>459890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/600/600b783f52d47c6f2133006b5475dd2a.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Matrix E3X (E3X-04)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2437" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_e3x_2012/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>399890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/54c/54c0fdd200942aea91dd559430cd5a9f.jpg</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Matrix E3X (2012)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2438" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_a7xi/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>949890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e89/e8987249f222a94d56639d156a822aa3.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Matrix A7XI</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2439" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_e50xr/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>188490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3e2/3e2a45e26a0f44964adaf981b8193de8.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр MATRIX E50XR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2440" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_a5x_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>698890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ee0/ee0f4d83da18b26d5d4ba8ec0f08f561.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Matrix A5X (2013)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2441" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_bronze_gym_e801_lc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>93490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2a5/2a5a8556b593423d9571db333fc2a99e.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BRONZE GYM E801 LC</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2442" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xg200y/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>110990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5f5/5f5a41805adfbf576d3cc10c0f6acf5c.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XG200Y</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2443" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_e7xi_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>799890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/71a/71a9775b806dc0c28f57e917c23eb2bf.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Matrix E7XI (2013)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2444" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_e30xer/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>217890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e5e/e5e52ae26a16774ccb76a30f772d9e2a.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр MATRIX E30XER</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2445" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_a30xr/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>208490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8a1/8a1b992f4681b95db574d1328c8b84ec.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр MATRIX A30XR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2446" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_bronze_gym_e901_pro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>172890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3de/3de699e79f98c13b975adab0bdf6a722.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр BRONZE GYM E901 PRO</name>
<description></description>
<manufacturer_warranty>3 года.</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2447" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xg400/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>139990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c62/c6297e17a2bbb9e6069f7d3930e10342.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XG400</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2448" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xg200i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>125490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/16d/16dc9ba2f16ef9368aada4614b0381e6.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XG200i</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2449" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xe795/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>156990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d5d/d5df1b09a14a0cce776c8e2570d4ed76.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XE795</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2450" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xe895_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>164990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/48f/48fa0bbf9ec7d87b737787ab11684b1d.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XE895 (2017)</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2451" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/adaptivnyy_krosstreyner_bronze_gym_ctr/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>449890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/928/9287c01992f31513d768298e890a0f94.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Адаптивный кросстрейнер BRONZE GYM CTR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2452" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xg200/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>109990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/25b/25b272f3ccd13211d639496b2e6b0220.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XG200</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2453" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xe580/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>107990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9b1/9b1f39408be13bdb92bf4e3ac4f13418.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XE580</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2454" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_ce800ent/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>332990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0c4/0c4fe9deab48dc1d0faceb8e5d453ff0.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness CE800ENT</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2455" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_e_glide/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>179990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f18/f18a3bca078193676cedc2fcc14f5821.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness e-Glide</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2456" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_a3x_2012/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>599890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b63/b637bf4b1b1360997e16c2724363559b.jpg</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Matrix A3X (2012)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2457" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xg400_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>139990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4ee/4ee004d93770a2308a4fdd5251c8afdc.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XG400 (2017)</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2458" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_a30xer/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>266890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0f5/0f56a5492bcfb6bd780a56d4d6e8fe90.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр MATRIX A30XER</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2459" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_ce800/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>199990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1f0/1f03230ca3fdb68d2fec6e8b879b90bb.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness CE800</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2460" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_e50xir/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>276890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b34/b348be7214630d3022ea70875a8445c1.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр MATRIX E50XIR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2461" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_infiniti_vg30/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>41990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/aec/aecba10b80846bf2fc243b4c25038637.jpg</picture>
<vendor>INFINITI</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Infiniti VG30</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2462" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xe330/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/899/899120c717c8810ab161210c57237e3d.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XE330</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2463" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xe395_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>139990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/763/7639a612d8c66698b397a2d86b304825.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XE395 (2017)</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2464" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_ce900/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>291990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/64e/64e604abf4b4a4854196801fdc3d2cca.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness CE900</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2465" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_a50xr/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>237490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4f6/4f675984a8a5fcdb04b0b33d9b48bad5.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр MATRIX A50XR</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2466" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xe795_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>163990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/44f/44fba0937e5f909d8e2eb87603615a21.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XE795 (2017)</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2467" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xe569e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>95990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f8f/f8f4d60c7a027ff23afb1ded3e68de71.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XE569Е</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2468" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_infiniti_vg40/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>45990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fe1/fe18c55eb52a22369abb801e6ea90cf4.jpg</picture>
<vendor>INFINITI</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Infiniti VG40</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2469" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_se205/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>46390</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/55c/55c3642b5b8f72eb6efe164aea2dfcef.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness SE205</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2470" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xe520s/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>80990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/564/564e6f496280455e8b1ef008aa081132.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XE520S</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2471" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xe326/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>64980</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/72c/72cddf45aa91f4cc00e1ae5af36e89b0.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XE326</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2472" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xe295_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>111490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2eb/2ebdec554865ef3a55a91bebf9c651b6.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XE295 (2017)</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2473" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_infiniti_vg60/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/946/9469f14a7366a99c2a64458d44a09f8c.jpg</picture>
<vendor>INFINITI</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Infiniti VG60</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2474" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_infiniti_vg20/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>37990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/21f/21f2dab97f517b74ddc143befe3dcdeb.jpg</picture>
<vendor>INFINITI</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Infiniti VG20</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2475" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_e30xr/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>158890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/34b/34b796b6a5121720ea6079a53424223b.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр MATRIX E30XR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2476" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xe195_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>96690</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/42c/42ce5fc7ee275344d82bd9c73e35ecbd.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XE195 (2017)</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2477" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_xe310/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/395/395e96e56c7e6851f78284a27de6aa58.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness XE310</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2478" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_e7xi_e7xi_03/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>819890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f9a/f9a2c7e99cd93a62bb6917f8403f43b3.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Matrix E7XI (E7XI-03)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2479" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_infiniti_xt_7/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/712/712867e91740ab2267f32bb5fb4b9049.jpg</picture>
<vendor>INFINITI</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Infiniti XT-7</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2480" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_se218/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>48990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d35/d358d8aa337f9991c7149aed819bfe97.jpg</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness SE218</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2481" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_a50xir/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>325490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/060/060097cec57421870396b4e7a924fc28.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр MATRIX A50XIR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2482" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_xterra_fs150/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>22950</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5d9/5d993edfa95cbdd271f59e62ffc183ab.png</picture>
<vendor>Xterra</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Xterra FS150</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2483" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_bronze_gym_pro_glider/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>89990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bde/bdeba7ecb4c114b96d741351dfa11463.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BRONZE GYM PRO GLIDER</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2484" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nautilus_e626/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>97900</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/44c/44cd166ce1cc70f74bb18c0a774c346a.jpg</picture>
<vendor>Nautilus</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Nautilus E626</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2485" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_a7xe_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>773890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/915/9157b5db88693d1c078bec6c9a7a8415.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Matrix A7XE (2013)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2486" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_evo_fitness_shark_el/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/466/466216986db5216a58a6e19863d6b4cb.jpg</picture>
<vendor>EVO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер EVO FITNESS Shark EL</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2487" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_dream_de_20/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>84990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d37/d37746fa1066082dc4154e41d97a0cca.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Dream DE 20</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2488" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_clear_fit_crosspower_cx_200/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6b1/6b1bf0336f2ad6901d13117f1f54e58f.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер — Clear Fit CrossPower CX 200</name>
<description></description>
<manufacturer_warranty>2</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2490" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_spirit_fitness_ce900ent/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>291990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e99/e9997fa4e9e8f1e1de07ae9284582c46.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Spirit Fitness CE900ENT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2491" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_a3x_a3x_04/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>649890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c8c/c8cb5430130867fc0731531d7bdc850b.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Matrix A3X (A3X-04)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2492" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipsoid_body_sculpture_be_6760gj/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24520</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/935/935ff87419336c44f8db774c1c1bf0a5.jpg</picture>
<vendor>BODY SCULPTURE</vendor>
<vendorCode></vendorCode>
<name>Эллипсоид BODY SCULPTURE BE-6760GJ</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2493" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_pro_form_smart_strider_495_cse/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bde/bde05ad94888ffba58de30366c3cc84f.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Pro-Form Smart Strider 495 CSE</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2494" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/krosstrener_maxtrainer_m5/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>128500</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b98/b98d8b91b433b46c5eabe0ed11a9fb02.jpg</picture>
<vendor>BOWFLEX</vendor>
<vendorCode></vendorCode>
<name>Кросстренер MaxTrainer M5</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2495" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nordictrack_space_saver_se7i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/362/3623946eb311f29c5fb426cd31e27db1.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер NordicTrack Space Saver SE7i</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2496" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_bronze_gym_e1001_pro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>257890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/08c/08cf83a63e24557307d2cbeef7c3fcf4.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BRONZE GYM E1001 PRO</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2497" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_xterra_fs_5_4e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>84990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8c2/8c2ae9c52ea3a0f8ee0d0a3eaa6b3783.png</picture>
<vendor>Xterra</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Xterra FS 5.4e</name>
<description></description>
<manufacturer_warranty>2 года при регистрации на сайте</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2498" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_evo_fitness_shark/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f8a/f8af72ce5d5da8583bc0dad04d167931.jpg</picture>
<vendor>EVO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер EVO FITNESS Shark</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2499" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/krosstrener_nordictrack_commercial_c12_9/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>109990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/886/8861537d63df8f92ac5746d52c8c0126.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Кросстренер NordicTrack Commercial C12.9</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2500" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_sole_e95_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>100100</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/eb2/eb2dd1fd1dfc0c5e011f2775ae2a6a5a.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Sole E95 (2013)</name>
<description></description>
<manufacturer_warranty>24 месяца</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2501" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/krosstrener_maxtrainer_m7/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>179900</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/456/456e9787ce8eb16c2e9b5db9559ec1c9.png</picture>
<vendor>BOWFLEX</vendor>
<vendorCode></vendorCode>
<name>Кросстренер MaxTrainer M7</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2502" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/krosstrener_maxtrainer_m3/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>92800</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/044/044664b7fd76c5f11fad681b6517288c.jpg</picture>
<vendor>BOWFLEX</vendor>
<vendorCode></vendorCode>
<name>Кросстренер MaxTrainer M3</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2503" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_fs_5_6e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99390</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/474/474801ae83f1711b84dcdf6e39057e63.png</picture>
<vendor>Adidas</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер FS 5.6e</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2504" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_pro_form_smart_strider_695_cse/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>64990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c97/c97288227776a9917796be4a44864f7c.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Pro-Form Smart Strider 695 CSE</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2505" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_xterra_fs_3_5/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>47990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/104/10457faf9a3ea9dc9ef692c666d520d1.png</picture>
<vendor>Xterra</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Xterra FS 3.5</name>
<description></description>
<manufacturer_warranty>2 года при регистрации на сайте</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2506" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_oxygen_gx_65_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>63890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/df8/df8bb39f6958431787caa904acef6907.jpg</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр OXYGEN GX-65 HRC</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2507" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipsoid_body_sculpture_be_7200_ghkg_hb/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>37560</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1e6/1e6fca465c1c0b20e36e9e9b69779dc2.jpg</picture>
<vendor>BODY SCULPTURE</vendor>
<vendorCode></vendorCode>
<name>Эллипсоид BODY SCULPTURE BE-7200 GHKG-HB</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2508" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_evo_fitness_tiger_el/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7b8/7b89fe9d5e0807a7d7e5adf4a7f9f35e.jpg</picture>
<vendor>EVO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер EVO FITNESS Tiger EL</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2509" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_matrix_a7xi_a7xi_03/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>999890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/25e/25e82df02aec0cf0274745cd103d15ab.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Matrix A7XI (A7XI-03)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2510" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipsoid_body_sculpture_be_6790g/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21580</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a77/a77dc17e369f16f28e80071413cf1144.jpg</picture>
<vendor>BODY SCULPTURE</vendor>
<vendorCode></vendorCode>
<name>Эллипсоид BODY SCULPTURE BE-6790G</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2511" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipsoid_sport_elit_se_960g/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19960</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a5e/a5ee3093a1921feff0df81c2e13f840c.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Эллипсоид SPORT ELIT SE-960G</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2512" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipsoid_sport_elit_se_800hp/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>25170</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/304/304990a595adedf3af9577f454e8a7a0.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Эллипсоид SPORT ELIT SE-800HP</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2513" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_xterra_fs380/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>52980</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/348/348e2d43e94cd711dd6147f510e538d5.png</picture>
<vendor>Xterra</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Xterra FS380</name>
<description></description>
<manufacturer_warranty>2 года при регистрации на сайте</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2514" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_xterra_fs_5_9e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>109990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7fc/7fcc55f8174c369c1b4fbb0f90f88954.jpg</picture>
<vendor>Xterra</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Xterra FS 5.9e</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2515" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_xterra_se205/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>42990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1fc/1fce01b92e7474fa5e7f97889a1bf9ce.png</picture>
<vendor>Xterra</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Xterra SE205</name>
<description></description>
<manufacturer_warranty>2 года при регистрации на сайте</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2516" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_svensson_industrial_force_e750_lx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>189990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1bc/1bcd82f85711104ff5561af5f9bc8486.png</picture>
<vendor>Svensson Industrial</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер SVENSSON INDUSTRIAL FORCE E750 LX</name>
<description></description>
<manufacturer_warranty>Рама - , Приводная система -</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2517" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_evo_fitness_elion/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e7b/e7be4ebd762fc2e62653e3f8d29d5100.jpg</picture>
<vendor>EVO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер EVO FITNESS Elion</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2518" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_fs_5_3e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>87990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/28e/28ed1c5fe11ef577b1dbbf9c327752b2.png</picture>
<vendor>Adidas</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер FS 5.3e</name>
<description></description>
<manufacturer_warranty>2 года при регистрации на сайте</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2519" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipsoid_body_sculpture_be_6700_h/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26140</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/803/8032a2b5abff7c1e0917fb87d45dd183.jpg</picture>
<vendor>BODY SCULPTURE</vendor>
<vendorCode></vendorCode>
<name>Эллипсоид BODY SCULPTURE BE-6700 H</name>
<description></description>
<manufacturer_warranty>	18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2520" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipsoid_body_sculpture_be_6600_hkg/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19950</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f78/f788c03bcc3a0f4193b73cf370ef3490.jpg</picture>
<vendor>BODY SCULPTURE</vendor>
<vendorCode></vendorCode>
<name>Эллипсоид BODY SCULPTURE BE-6600 HKG</name>
<description></description>
<manufacturer_warranty>	18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2521" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_svensson_industrial_force_e750/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>169990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/521/52150361f49e1ce77ac7efa3eb198968.png</picture>
<vendor>Svensson Industrial</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер SVENSSON INDUSTRIAL FORCE E750</name>
<description></description>
<manufacturer_warranty>Рама - , Приводная система -</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2522" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/velotrenazher_family_fs_40/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ed2/ed249cfc42a8bd6e1974d8db04a73ef5.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Family FS 40</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2523" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_applegate_x23_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/644/644c9829e487b319084197f363c120d7.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер APPLEGATE X23 M</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 0,5 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2524" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/trenazher_bowflex_treadclimber_tc10/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29790</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1e7/1e728bf99de2e9a6c14d89ff34aa3717.jpg</picture>
<vendor>BOWFLEX</vendor>
<vendorCode></vendorCode>
<name>Тренажер Bowflex TreadClimber TC10</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2525" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_evo_fitness_stella/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/52b/52bd5d84dc584318724926bebbb8ff50.jpg</picture>
<vendor>EVO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер EVO FITNESS Stella</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2526" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_kommercheskiy_proxima_gravitas_art_fe758tgbq/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>139990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/874/874fab31e0b748c753622408b5039988.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер коммерческий PROXIMA GRAVITAS арт FE758TGBQ</name>
<description></description>
<manufacturer_warranty>2 года. Рама, маховик - 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2527" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_bronze_gym_x901_pro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>189890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/960/960681e64093250d345d7c8ee466106a.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр BRONZE GYM X901 PRO</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2528" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_clear_fit_maxpower_x350/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>61990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0de/0de81d96ccb4c1073519fc33dc9fa851.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер — Clear Fit MaxPower X350</name>
<description></description>
<manufacturer_warranty>2</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2529" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_evo_fitness_orion_el/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b35/b350f292631f7590055f352c3f6dfff1.jpg</picture>
<vendor>EVO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер EVO FITNESS Orion EL</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2530" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_clear_fit_maxpower_x450/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>67990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/de6/de639d20134e3b7dab2269465efe41ab.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер — Clear Fit MaxPower X450</name>
<description></description>
<manufacturer_warranty>2</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2531" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_horizon_citta_et5_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>62490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/569/5692e31d6b3b87712ea072c0e86d548b.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр HORIZON CITTA ET5.0</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2532" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/velotrenazher_family_fb_10/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>10990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Family FB 10</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2533" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_bh_fitness_tfc_19_dual_plus_dual_kit/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>76990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f24/f2465f9206df30f26d102c5206dec2c0.jpg</picture>
<vendor>BH FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BH FITNESS TFC 19 DUAL PLUS + Dual Kit</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2534" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_xterra_se210/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>50990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/185/185f6d41c14dbf092c03f7b35c29959c.png</picture>
<vendor>Xterra</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Xterra SE210</name>
<description></description>
<manufacturer_warranty>2 года при регистрации на сайте</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2535" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_dender_lackert/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>45990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/67c/67c18a450998eeca447164443d9aca4a.jpg</picture>
<vendor>Dender</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Dender Lackert</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2536" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_bh_fitness_tfc_19_dual/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8ee/8eebcdd2d3136ffad958de615a0191cd.jpg</picture>
<vendor>BH FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BH FITNESS TFC 19 DUAL</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2537" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_xterra_fs_4_5e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/60c/60c27aad944b91a5c8d0d602f3aa79d9.png</picture>
<vendor>Xterra</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Xterra FS 4.5e</name>
<description></description>
<manufacturer_warranty>2 года при регистрации на сайте</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2538" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_applegate_x52_a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/485/485c3ec988107c6f2156123801bf85da.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер APPLEGATE X52 A</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 0,5 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2539" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipsoid_sport_elit_se_703_magnitnyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18380</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7a5/7a5ebc64fdf46a6311b208a7a4c8a8ab.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Эллипсоид SPORT ELIT SE-703(магнитный)</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2540" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_clear_fit_crosspower_cx_400/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/287/287dfbd71c1153a73674d8568e66fba2.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер — Clear Fit CrossPower CX 400</name>
<description></description>
<manufacturer_warranty>2</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2541" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_evo_fitness_orion/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>22490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/13f/13f89a9e97a41f449c82643c75853426.jpg</picture>
<vendor>EVO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер EVO FITNESS Orion</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2542" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_svensson_industrial_go_e65/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>139990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a3a/a3af5671271e1c24f445973c66e8fadc.png</picture>
<vendor>Svensson Industrial</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер SVENSSON INDUSTRIAL GO E65</name>
<description></description>
<manufacturer_warranty>1 год (рама 5 лет, детали износа 0,5 года)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2543" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_svensson_industrial_hit_x850_lx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>209990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ba5/ba595cc8a66157f3fa0f10f8d6233415.png</picture>
<vendor>Svensson Industrial</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер SVENSSON INDUSTRIAL HIT X850 LX</name>
<description></description>
<manufacturer_warranty>1 год (рама 5 лет, детали износа 0,5 года)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2544" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_vision_s7100_hrt_2012/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>229890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/beb/bebf2f9c3a2926b9fbb76cb086726a90.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер VISION S7100 HRT (2012)</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2545" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/velotrenazher_family_fb_30/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0a8/0a84029722753e36e4baf9c056bd1fbf.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Family FB 30</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2546" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_clear_fit_crosspower_cx_300/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>46990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/442/44253401661b589e2b35b5ba7755e72e.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер — Clear Fit CrossPower CX 300</name>
<description></description>
<manufacturer_warranty>2</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2547" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_dender_vilborg/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b76/b7617e32883630ed512576d8e5029a6b.jpg</picture>
<vendor>Dender</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Dender Vilborg</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2548" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_clear_fit_crosspower_cx_450/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f74/f74317bd37f17f5fd44f2529195661cd.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер — Clear Fit CrossPower CX 450</name>
<description></description>
<manufacturer_warranty>2</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2549" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_svensson_industrial_hit_x850/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>189990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/382/382fa1c970da7b807f16e554ec4c0d20.png</picture>
<vendor>Svensson Industrial</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер SVENSSON INDUSTRIAL HIT X850</name>
<description></description>
<manufacturer_warranty>1 год (рама 5 лет, детали износа 0,5 года)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2550" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipsoid_sport_elit_se_954d/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23710</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/391/391e57cc181f25e4f25d0604ec8f4c2e.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Эллипсоид SPORT ELIT SE-954D</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2551" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/krosstrener_nordictrack_audiostrider_400/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>37990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e45/e459be2454001a79b0c88b767e458382.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Кросстренер NordicTrack AudioStrider 400</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2552" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_energetics_xt_121p/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9f0/9f04980c3bf78690ae8e51dccae69177.jpg</picture>
<vendor>Energetics</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер ENERGETICS XT 121p</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2553" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_compact_ce_40/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ac6/ac6238aa759b33b92f8cae0a04175f78.png</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Compact CE 40</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2554" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_dender_alesund/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>33990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/525/5250e4f4f23d8c8cc2bf5ee5b31b90bc.jpg</picture>
<vendor>Dender</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Dender Alesund</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2555" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_dender_kvist/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e8d/e8d1743c859fc468f83a787819535580.jpg</picture>
<vendor>Dender</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Dender Kvist</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2556" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipsoid_sport_elit_se_502d/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>22400</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e25/e25caf95ac825ed478aa35232bfca430.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Эллипсоид SPORT ELIT SE-502D</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2557" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_compact_ce_46/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>43990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2ad/2ad1ff80a91059e8f4d76c027a379d5d.png</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Compact CE 46</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2558" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_applegate_x32_a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d60/d601d61ac162d9fc3e26caa0a37c8497.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер APPLEGATE X32 A</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 0,5 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2559" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dfc_e8711h/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/eec/eecd8511632a8fa03fa2422747add231.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер DFC E8711H</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2560" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_bh_fitness_brazil_plus_gsg/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/30d/30dabccf23860f5a56379c9907ad20cb.jpg</picture>
<vendor>BH FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BH FITNESS BRAZIL PLUS GSG</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2561" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/krosstrener_nordictrack_a_c_t_commercial_7/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>89990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Кросстренер NordicTrack A.C.T. Commercial 7</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2562" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_hasttings_fs400_sparta_black/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/819/819d47b97e3e56c9e741de4cc6efb664.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Hasttings FS400 SPARTA (Black)</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2563" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dender_solfried/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e2a/e2ae4920e9b27f1484f4b287d4665691.jpg</picture>
<vendor>Dender</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Dender Solfried</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2564" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_family_fe_36l/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ffd/ffd1c02863cab199bee59db8687031c7.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Family FE 36L</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2565" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_dender_allicante/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>55990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c23/c23735fd6860a95149a4478d9e90ea9c.jpg</picture>
<vendor>Dender</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр Dender Allicante</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2566" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_horizon_endurance_4_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>105490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ed6/ed671a471c18a3b5d1d901b00c0c0249.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр HORIZON ENDURANCE 4 (2013)</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2567" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_clear_fit_crosspower_cx_250/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>44990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/966/966c2580f084efb8d4545996951bc669.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер — Clear Fit CrossPower CX 250</name>
<description></description>
<manufacturer_warranty>2</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2568" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_svensson_body_labs_heavy_g_elliptical/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>64990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d9d/d9d62062494c5ee9ef9f91c9039344c7.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер SVENSSON BODY LABS HEAVY G ELLIPTICAL</name>
<description></description>
<manufacturer_warranty>Рама - 2 года, Приводная система - 1,5 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2569" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_horizon_elite_e4000_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>125490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c0e/c0edac062e41c0ce08379824c032ca99.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр HORIZON ELITE E4000 (2013)</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2570" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_hasttings_dre60/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>51990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/08a/08a7ea53e1fe646d81cb63772a5e12e2.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Hasttings DRE60</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2571" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_horizon_endurance_3_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>89490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0cc/0cc5dcfea715b926c5d482894a1c29d8.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр HORIZON ENDURANCE 3 (2013)</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2572" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_bh_fitness_iridium_avant_program/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/057/0579dbb910380527218746caf5d027d8.jpg</picture>
<vendor>BH FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BH FITNESS IRIDIUM AVANT PROGRAM</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2573" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dfc_e8712hp/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>22990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/271/2713183e1da44038f1c90129fa9e437f.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер DFC E8712HP</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2574" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_energetics_xt_421p/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/763/7633c4c3eb14ef25b9eac6115bf0668b.jpg</picture>
<vendor>Energetics</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер ENERGETICS XT 421p</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2575" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_bh_fitness_khronos_generator/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>89990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e0a/e0ab689fb3218ea36735945eb4a75b12.jpg</picture>
<vendor>BH FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BH FITNESS KHRONOS GENERATOR</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2576" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_bh_fitness_atlantic_program/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>44990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/71b/71bd5328e745130b7a0e6b7ee17fd58b.jpg</picture>
<vendor>BH FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BH FITNESS ATLANTIC PROGRAM</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2577" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nordictrack_c_9_5/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>89990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bc8/bc844819ca9c676407d9911091ca6cac.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер NordicTrack C 9.5</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2578" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/velotrenazher_bh_fitness_nexor_dual/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/855/855ea9e8e1009e429a60034ccb5c750c.jpg</picture>
<vendor>BH FITNESS</vendor>
<vendorCode></vendorCode>
<name>Велотренажер BH FITNESS NEXOR DUAL</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2579" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dfc_e8712h/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5cc/5ccc10b0ae1ad392bf035c2b9745cc52.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер DFC E8712H</name>
<description></description>
<manufacturer_warranty>1 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2580" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dfc_e8732hp/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/598/59810e6c3286e0f398df7c8bb480ce39.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер DFC E8732HP</name>
<description></description>
<manufacturer_warranty>1 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2581" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_aero_ae_515/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>74990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/86a/86acb0f6b52ca40e94bae5a22a489d63.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Aero AE 515</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2582" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nordictrack_commercial_14_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>119990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/22d/22d79611998b33c7d6e7287200fd83c0.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер NordicTrack Commercial 14.0</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2583" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/krosstrener_nordictrack_fs7i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>149990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7ae/7ae9543624b37e757f916c8beddddc12.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Кросстренер NordicTrack FS7i</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2584" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_bh_fitness_athlon/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f56/f5633ed9004310270b1497272fe16778.jpg</picture>
<vendor>BH FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BH FITNESS ATHLON</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2585" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_svensson_industrial_base_x550/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/654/654281c1f0c82394aef55e765696c1e0.png</picture>
<vendor></vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер SVENSSON INDUSTRIAL BASE X550</name>
<description></description>
<manufacturer_warranty>Рама - , Приводная система -</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2586" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/velotrenazher_bh_fitness_carbon_bike_program/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>42990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c7a/c7a19e13e80abd94c1718debc5da2e9e.jpg</picture>
<vendor>BH FITNESS</vendor>
<vendorCode></vendorCode>
<name>Велотренажер BH FITNESS CARBON BIKE PROGRAM</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2587" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_horizon_endurance_5_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>122490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/936/93665e095497365b43f97184aa13247d.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр HORIZON ENDURANCE 5 (2013)</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2588" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_pro_form_475_zle/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/add/add74088d4e4ea2cccc5183bfba65e72.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Pro-Form 475 ZLE</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2589" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nautilus_e628/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>125900</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6d4/6d468144cd08e28629dac1fd57d1ec64.jpg</picture>
<vendor>Nautilus</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Nautilus E628</name>
<description></description>
<manufacturer_warranty>24 мес</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2590" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dfc_e8711hp/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1c3/1c3fdca452a2d0a1db8430b97656981f.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер DFC E8711HP</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2591" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_pro_form_325cse/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/cf9/cf95d094adeacc168b55ef500fe181a5.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Pro-Form 325CSE</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2592" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/krosstrener_nordictrack_e12_2/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>83990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/eb5/eb51d6a30cfd673111884ad0f443823f.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Кросстренер NordicTrack E12.2</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2593" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_pro_form_endurance_320_e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6fd/6fd84e7531706a7713556d69e864f0b2.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер PRO-FORM Endurance 320 E</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2594" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nordictrack_c_5_5/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>63990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e3f/e3f7a1c671f94de85f3ef1f685d732d4.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер NordicTrack C 5.5</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2595" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dfc_e8602t/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/38c/38ccaebb205b647dd4369949af5733fb.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер DFC E8602T</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2596" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_bh_fitness_athlon_program/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1ee/1ee0b86b3a0e3773ca7a9b69729584ae.jpg</picture>
<vendor>BH FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BH FITNESS ATHLON PROGRAM</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2597" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/trenazher_dlya_khodby_bowflex_treadclimber_tc20/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>33990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1c3/1c34b063702b397e5ab7f47122b1f326.jpg</picture>
<vendor>BOWFLEX</vendor>
<vendorCode></vendorCode>
<name>Тренажер для ходьбы Bowflex TreadClimber TC20</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2598" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_pro_form_pf_900_zle/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>43990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ce9/ce9909bcf58a4f63a7c92ba3bf4b00d2.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Pro-Form PF 900 ZLE</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2599" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_bh_fitness_brazil_plus_program/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/076/076c13894169ea51ba476e4405f96014.jpg</picture>
<vendor>BH FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BH FITNESS BRAZIL PLUS PROGRAM</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2600" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dfc_challenge_climber_1_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12790</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fa4/fa41fcde91b68dbdb5085311cc210cfe.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер DFC Challenge Climber 1.0</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2601" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_hasttings_q300_medusa/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8ba/8babef13151a42a52fbe04cf348f82fc.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Hasttings Q300 MEDUSA</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2602" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nordictrack_elite_12_5/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>89990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8b3/8b34ee5fda164dae001dc41be8d70bb4.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер NORDICTRACK Elite 12.5</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2603" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_vision_x20_elegant/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>159890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7ba/7ba0595ad73f718d5f57620945ca9a5d.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр VISION X20 ELEGANT</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2604" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_vision_xf40_touch/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>269890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/538/5389b0168266ee6efec548134711843e.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр VISION XF40 TOUCH</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2605" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_zipro_fitness_hulk/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b88/b8889f4bc8af6d336f0816ea0b2fae1a.jpg</picture>
<vendor>ZIPRO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер ZIPRO FITNESS Hulk</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2606" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_vision_xf40_classic/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>199890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f7f/f7fe8c44ab6e8ccd7eb7484be1fb2aa8.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр VISION XF40 CLASSIC</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2607" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_pro_form_225cse/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>25990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/cd3/cd320d3cee23d141bdec679e1f4d2a04.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Pro-Form 225CSE</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2608" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_aero_ae_403/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>53990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d2d/d2ddc845b105991f33ae800847d7da93.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Aero AE 403</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2609" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_pro_form_endurance_920e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>89990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/188/18880a86b085a305c1ae68cc3b44bcba.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Pro-Form Endurance 920E</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2610" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_aero_ae_460/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/713/71347eefbc68ee0bd815bfc01368386b.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Aero AE 460</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2611" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_pro_form_space_saver_700/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f9e/f9e4eefe3ed23461333ec312197a934a.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Pro-Form Space Saver 700</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2612" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_pro_form_cardio_hit/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2ca/2ca9eabbf8489fff74b58dea05f57fcf.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Pro-Form CARDIO HIT</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2613" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_diamond_fitness_x_rival_cross/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/456/456c2604497f17d4a576791255f9f49f.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Diamond Fitness X-Rival Cross</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2614" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_dream_de_60/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>119000</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8cc/8cc2b8f28bcdd828c0b1c1231eb87870.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Dream DE 60</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2615" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_magnitnyy_royal_fitness_dp_e020/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4b6/4b6a895745c2950cb11fe50072735157.jpg</picture>
<vendor>Royal Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер магнитный Royal Fitness DP-E020</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2616" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_aero_ae_465/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>64990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3e4/3e40b9f36576658334d6e5eb924c11be.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Aero AE 465</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2617" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_sole_e25/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>86800</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1e1/1e1454537e452ed7832e4390a5ded965.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Sole E25</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2618" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/krosstrener_nordictrack_a_c_t_commercial/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e5c/e5c2e8786dfa7dfbcea4701fc2317274.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Кросстренер NordicTrack A.C.T. Commercial</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2619" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_optima_fitness_opticross_21/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34900</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c3f/c3fafdcdc771ca366c936d179f9eab9b.jpg</picture>
<vendor>Optima Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Optima Fitness OptiCross 21</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2620" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/krosstrener_pro_form_hybrid_trainer/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5c4/5c48c1bd002f95147eb34b37a1e1b74a.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Кросстренер Pro-Form Hybrid Trainer</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2621" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_hasttings_q600_medusa/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9ee/9eee908b11c9b3667f11d908a6bda2fe.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Hasttings Q600 MEDUSA</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2622" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_aero_ae_403_w/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>55990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6c9/6c947553da9b1b27dfe64fc97b1fd459.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Aero AE 403 W</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2623" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_hasttings_dre40/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>38790</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/411/41163ed9b2c4ec4a414312e177952652.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Hasttings DRE40</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2624" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_pro_form_trainer_7_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>79990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/df1/df1ed0258be31b08cc5cd7d641af14ca.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Pro-Form Trainer 7.0</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2625" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_sole_e35_2016/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99900</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/65d/65d13ecdd571af625a83a74225ac1911.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Sole E35 (2016)</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2626" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_vision_s60/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>229890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/475/4756ab750d211a6ada824431909a5edc.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр VISION S60</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2627" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_dream_de_40/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>109000</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3aa/3aadcb5b4ae626327934b66d40d249d7.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Dream DE 40</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2628" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_sole_e98/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>160090</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/134/13486537e7e2d13d336e71dab0d2bc33.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Sole E98</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2629" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_aero_ae_401/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>44990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c38/c38e206e2b383b053f2d5260a0323592.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Aero AE 401</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2630" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_vision_x20_touch/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>194890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a74/a74937d833d79f0731de6df366e89e4d.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр VISION X20 TOUCH</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2631" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_bh_fitness_fdc_20_gsg/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>84990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/91b/91b4ac020d6c6034fd822e468a68e299.jpg</picture>
<vendor>BH FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BH FITNESS FDC 20 GSG</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2632" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_sole_e55/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>112070</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e2e/e2e08438cb60618ceac763bff7baf040.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Sole E55</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2633" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_bh_fitness_fdc_19/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>74990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6be/6be554ca8ed5026a80bab014a68dcf6f.jpg</picture>
<vendor>BH FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BH FITNESS FDC 19</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2634" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_pro_form_endurance_720_e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/503/503017b8a3fe6ed213e00743d973707c.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Pro-Form Endurance 720 E</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2635" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dfc_challenge_climber_3_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18690</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/885/885fce282edda1f987cbed4727a4bca3.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер DFC Challenge Climber 3.0</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2636" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_sole_e20/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>76700</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1fd/1fd47c493f530d9f3fbbedabc895d3ee.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Sole E20</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2637" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dfc_e8731t/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>33990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d32/d32aa9d8e2881bb766e5a4ca5c869d0b.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер DFC E8731T</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2638" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_sole_e95_2016/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>105700</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9f3/9f32591866c00c8b9557abd66e7452a7.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Sole E95 (2016)</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2639" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_hasttings_dre20/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34650</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f24/f242be1f44d7318c488b4741873f8f36.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Hasttings DRE20</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2640" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_pro_form_endurance_520_e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ae9/ae924ffb6fbbd4a22333b9063d3d32c7.jpg</picture>
<vendor></vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Pro-Form Endurance 520 E</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2641" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_vision_x20_classic/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>129890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/17d/17d0d7cf6d197570081602a168fa2ebd.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр VISION X20 CLASSIC</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2642" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nordictrack_e5_4/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/cb4/cb4c1d52b224b5684a76ed6092ebae88.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер NordicTrack E5.4</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2643" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_vision_xf40_elegant/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>234890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d6a/d6a45eb7b3aea87f799cc4f86ad65113.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр VISION XF40 ELEGANT</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2644" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_optima_fitness_opticross_19/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29900</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/be7/be7a3bff29d2cd611ae27d924216c11a.jpg</picture>
<vendor>Optima Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Optima Fitness OptiCross 19</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2645" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazhyer_ammity_ocean_oe_40/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>120000</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a98/a98c527803940ae2e61fa32477e1cd72.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажёр AMMITY Ocean OE 40</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2646" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_hasttings_fs300_aero/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>25990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6c5/6c54035fe1f3bafbd8964a955d34dfd4.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Hasttings FS300 AERO</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2647" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nordictrack_e500/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>44990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c24/c249a6f9371138b1efa037a5c1f662bf.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер NordicTrack E500</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2648" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_zipro_fitness_neon/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15590</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/073/073c9c8ffb92eae0b6eb592ea18e7495.jpg</picture>
<vendor>ZIPRO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер ZIPRO FITNESS Neon</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2649" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_horizon_andes_5_viewfit/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d7f/d7f45b334d38e6f9ffa1281fa7e0a3ee.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр HORIZON ANDES 5 VIEWFIT</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2650" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_pro_form_endurance_420e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>52990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/47c/47c7b3371556c5e76a973bc6b5ef2676.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Pro-Form Endurance 420E</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2651" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nordictrack_c_7_5/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>68990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/296/296209ad1be9d942200719905bd0bef0.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер NordicTrack C 7.5</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2652" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_zipro_fitness_shox/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/247/2472017fd0405c373bd34c2559f30e89.jpg</picture>
<vendor>ZIPRO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер ZIPRO FITNESS Shox</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2653" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_basic_fitness_e508/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19690</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bdf/bdf71c9ad3a142f2b06e593c11089eb4.jpg</picture>
<vendor>Basic Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BASIC FITNESS E508</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2654" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nordictrack_e11_5/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>73990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b1f/b1f5af6b562972d0b4218ff93980eaac.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер NordicTrack E11.5</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2655" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dfc_challenge_climber_2_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15290</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/eb2/eb295f74a5b80e647fe674a9a9821ab8.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер DFC Challenge Climber 2.0</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2656" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_family_vr30/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/137/137cddd7755a6b8c75c7200ec6b35a8a.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Family VR30</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2657" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nordictrack_e600/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/85c/85c47946f1b62b08f734da2e49cd0746.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер NordicTrack E600</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2658" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_family_vr20/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>25990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ba0/ba05ef326ef4f887ff28bd341f08a238.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Family VR20</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2659" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_diamond_fitness_x_circle_cross/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/04c/04cf1e7b4705aebd2dfa7ddcc2ff31e2.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Diamond Fitness X-Circle Cross</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2660" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_sole_e35/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>95100</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ef7/ef7c5b57863eda782a52d40aaccef796.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Sole E35</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2661" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_hasttings_x7/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>33990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b45/b45cb7ec2fa37872c468ff929b0ccd36.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Hasttings X7</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2662" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_horizon_andes_7i_viewfit/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>119490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f5f/f5f52b891461f3cbfb44ac413d82b161.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр HORIZON ANDES 7i VIEWFIT</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2663" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_magnitnyy_royal_fitness_dp_418e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>11990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/334/3341550b18ba07f92d7efe320b7f2107.jpg</picture>
<vendor>Royal Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер магнитный Royal Fitness DP-418E</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2664" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/krosstrener_pro_form_endurance_320e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/eff/effcf7d97fbbe58820c5f125c872d8f6.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Кросстренер Pro-Form Endurance 320E</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2665" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_basic_fitness_e510s/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a99/a99a84731271bc6815334d3dfc1afafd.jpg</picture>
<vendor>Basic Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BASIC FITNESS E510S</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2666" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_diamond_fitness_smart_cross/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/877/877994f0a7f85c0fa1f70cce7acd77b4.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Diamond Fitness Smart Cross</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2667" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_hasttings_cardio_cross/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>44890</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bc2/bc26d223b7a5711b53025084bc6f821d.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Hasttings Cardio Cross</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2668" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_basic_fitness_e506/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/959/9599ebf51456025aa5b7eb5aa2981411.jpg</picture>
<vendor>Basic Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер BASIC FITNESS E506</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2669" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nordictrack_e10_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>74990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1e4/1e48d59a2439355e6a3b5b28375d9b6c.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер NORDICTRACK E10.0</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2670" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nordictrack_e7_1/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>57990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/402/4025f82370053b5e9bee6491039255f0.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер NORDICTRACK E7.1</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2671" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/krosstrener_pro_form_endurance_420e_bez_adaptera/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>52990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e8a/e8a7e9139c984d483b8fb8b6bdb49736.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Кросстренер Pro-Form Endurance 420E (без адаптера)</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2672" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_hasttings_wega_sx5/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>41990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e50/e5080bfb141143411b58ad1151da1151.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Hasttings Wega SX5</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2673" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nordictrack_e9_5/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99900</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b90/b90ed780527105eb0ec81e9e71672235.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер NORDICTRACK E9.5</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2674" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dfc_ce001m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/42a/42afad5a0e1107d49bb00103c58e0a60.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер DFC CE001M</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2675" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_family_vr40/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/009/0093cca1663cb6e8871ca6ee3d28cee5.jpg</picture>
<vendor>FAMILY</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Family VR40</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2676" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dfc_ce001/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b79/b79607e96b032af1a091a3467d3e25b1.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер DFC CE001</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2677" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_sole_e95s_2016/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>138900</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d99/d991d3106a1f92fd435a3e3282d15e02.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер Sole E95S (2016)</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2678" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dfc_pt_04me/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4c8/4c83c480f44ccf80f65eb55768b1e78b.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер DFC PT-04ME</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2679" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dfc_pt_002/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d2f/d2f60bd9f320694cdae950db98921cbf.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер DFC PT-002</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2680" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_applegate_e20_a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>30990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d1e/d1edf8dd3673c3cc6ce87cd5b415d450.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер APPLEGATE E20 A</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 0,5 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2681" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_applegate_e20_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ac7/ac75a081ced6150ffc040774c608dc15.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер APPLEGATE E20 M</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 0,5 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2682" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nordictrack_e4_2/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>44990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5e6/5e64fba3fdb88e6ddf4550af89fb3bf9.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер NORDICTRACK E4.2</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2683" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_ergometr_horizon_andes_3_new/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>87490</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/63e/63ebfc9a4063b1734c61871aa3bd600f.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Эллиптический эргометр HORIZON ANDES 3 NEW</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2684" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_nordictrack_e4_1/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>44990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9b1/9b11b93b5566caaa060dfe514574a688.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер NORDICTRACK E4.1</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2685" available="true">
<url>http://sportzastava.ru/catalog/ellipticheskie_trenazhery/ellipticheskiy_trenazher_dfc_pt_002m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18990</price>
<currencyId>RUB</currencyId>
<categoryId>155</categoryId>
<picture>http://sportzastava.ru/upload/iblock/902/902fa98116ba935c916d77c3c70251ed.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Эллиптический тренажер DFC PT-002M</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2686" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/gorizontalnyy_veloellipsoid_ammity_ocean_or_50/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>107000</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/cae/cae2285b90c88c40e3fd5a9e3b2d72c3.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Горизонтальный велоэллипсоид AMMITY Ocean OR 50</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2687" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/gorizontalnyy_velotrenazhyer_ammity_ocean_or_40/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>93000</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/37c/37c9feeb94213ce5e46c995148f5b241.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Горизонтальный велотренажёр AMMITY Ocean OR 40</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2688" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_svensson_body_labs_heavy_g_recumbent/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/223/223ea7e5ce67c422ef55eed7aa646f2f.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SVENSSON BODY LABS HEAVY G RECUMBENT</name>
<description></description>
<manufacturer_warranty>Рама - 2 года, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2689" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_svensson_body_labs_heavy_g_upright/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>37990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e31/e313f3ec1fcb29f43a6d3060b3e4863b.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SVENSSON BODY LABS HEAVY G UPRIGHT</name>
<description></description>
<manufacturer_warranty>Рама - 2 года, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2690" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/vertikalnyy_velotrenazhyer_ammity_dream_db_40/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>45990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d42/d4253969d2909ea43840c96d8de3ed64.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Вертикальный велотренажёр AMMITY Dream DB 40</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2691" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_svensson_body_labs_crossline_bma/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5b4/5b463aefd7a19f4576b16f3370494fac.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SVENSSON BODY LABS CROSSLINE BMA</name>
<description></description>
<manufacturer_warranty>Рама - 2 года, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2692" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_svensson_body_labs_crossline_bhm/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16690</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d9d/d9d3984fb31258300f29c2a7fc3480a5.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SVENSSON BODY LABS CROSSLINE BHM</name>
<description></description>
<manufacturer_warranty>Рама - 2 года, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2693" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_applegate_h42_a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>37990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f7e/f7ef0f1c7956a48707ae73a35612fc1b.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Велотренажер APPLEGATE H42 A</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2694" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_svensson_body_labs_crossline_bta/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/449/4499232ad354d7dce927abcda1e1c333.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SVENSSON BODY LABS CROSSLINE BTA</name>
<description></description>
<manufacturer_warranty>Рама - 2 года, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2695" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_svensson_body_labs_crossline_bcm/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7cb/7cb2da0201d7acd45295944881ee03c8.png</picture>
<vendor>Svensson Body Labs</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SVENSSON BODY LABS CROSSLINE BCM</name>
<description></description>
<manufacturer_warranty>Рама - 2 года, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2696" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/vertikalnyy_velotrenazhyer_ammity_dream_db_30/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>42990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/379/379a65800a38ecadd60e4bfb1f760897.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Вертикальный велотренажёр AMMITY Dream DB 30</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2697" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/vertikalnyy_velotrenazhyer_ammity_dream_db_50/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2f2/2f2dbc9013beb95cef75500b6166c257.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Вертикальный велотренажёр AMMITY Dream DB 50</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2698" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_oxygen_satori_ub_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>30890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7b7/7b71c23652a8e792c5750849ba99b627.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр OXYGEN SATORI UB HRC</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2699" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_oxygen_liner/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/088/08844cbde3a28cb3cd9be31907fff701.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Велотренажер OXYGEN LINER</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2700" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_applegate_b20_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4fa/4fad69905d2fdd3b37e26583d86c7967.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Велотренажер APPLEGATE B20 M</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2701" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_oxygen_nexus_guru_rb_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f44/f4469b50de4de8c69c5bfa25aa4f3076.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр OXYGEN NEXUS GURU RB HRC</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2702" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_oxygen_nexus_guru_ub_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/abf/abf9bfc7285c935bfe86b0923a6a03a7.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр OXYGEN NEXUS GURU UB HRC</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2703" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_applegate_b20_a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>22690</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/cb4/cb43882b1111b8cb80caaa0be6d90eed.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Велотренажер APPLEGATE B20 A</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2704" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_oxygen_satori_rb_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>42890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bf1/bf13c8a47f01456eddc2d504742c88bc.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр OXYGEN SATORI RB HRC</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2705" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_oxygen_pro_trac_ii/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>25890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/49c/49c1eb3c30c724598e6fb7785382e1b2.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Велотренажер OXYGEN PRO TRAC II</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2706" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_oxygen_pelican_ii_ub/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/793/79384a83d7df20f7969db49530868e4b.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Велотренажер OXYGEN PELICAN II UB</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2707" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_oxygen_peak_u/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/88b/88b252df2dedfd9e3d8ebcfe7101309e.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Велотренажер OXYGEN PEAK U</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2708" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_oxygen_flamingo/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/10b/10bb849e0b5a06d08a82863a7c65f487.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Велотренажер OXYGEN FLAMINGO</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2709" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_oxygen_cardio_concept_iv_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fbf/fbf49f77f244d4cc6de22b921482fcf4.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр OXYGEN CARDIO CONCEPT IV HRC+</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2710" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_oxygen_jet_star/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4dd/4dde6182d917a29b00fc646704ad5c0f.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр OXYGEN JET STAR</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2711" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_u3xe_2012/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>287490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c7c/c7c07dc0c049f232fb52b8996126a157.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix U3XE (2012)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2712" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_u3x_v_05/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>269890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/af3/af3359320bd30be475e17bb41e804391.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix U3X (v.05)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2713" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_u1x/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3d1/3d1999d89b7a4a73f01d5ff7d6b171d6.jpg</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр MATRIX U1X</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2714" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_u3x_u3x_06/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>299890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c5e/c5e52afd62d6cde3e583ce1fcda291ff.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix U3X (U3X-06)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2715" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_xbu55/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>89990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e32/e32f589eb61c279d5b5113f19c342065.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness XBU55</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2716" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_r7xe_va_v_05/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>549890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9cb/9cbcec267a64bd9b3f6a300e87a89ae5.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix R7XE VA (v.05)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2717" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_r3x_v_05/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>289890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6ef/6efd9c8664b2ff06c6ebf297491534f6.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix R3X (v.05)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2718" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_u5x_v_05/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>329890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/313/3136a9285e1d61d84439738ccbaaf2d4.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix U5X (v.05)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2719" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_u7xe_va_v_05/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>549890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/be9/be974a92335ce1b4e89bac5b1af74f36.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix U7XE VA (v.05)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2720" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_h3x_2012/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>178890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e81/e81d231e49b2a7a10801e6110404175f.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix H3X (2012)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2721" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_r7xe_va_2013/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>524890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9fe/9fe50f25fbf672c278b557917490836a.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix R7XE VA (2013)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2722" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_u7xe_va_2012/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>524890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/811/8117f5f51548423be7cd2a3a446f374d.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix U7XE VA (2012)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2723" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_u7xi_v_05/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>599890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/92f/92f858f22a70c4c29f996a2c3ef81ef7.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix U7XI (v.05)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2724" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_cr800/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>164990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d45/d450e3871b716b78b9fe472e057cbc0d.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness CR800</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2725" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_u1x_u1x_02/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>159890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/834/834f2ad41fbef9ab8f318d7d6756b5d2.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр MATRIX U1X (U1X-02)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2726" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/spin_bayk_bronze_gym_s1000_pro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/158/15813542231325a032b22ec6a7c9d006.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Спин-байк BRONZE GYM S1000 PRO</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2727" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_cu800/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>128990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/62b/62b103c85e500787e753da89833d1203.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness CU800</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2728" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_r5x_v_05/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>319890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a3e/a3e26b47701b0d204f6efcf6e0b90174.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix R5X (v.05)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2729" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_xbr95/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>125990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1dc/1dc684262a30786a8f729d6d630305d8.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness XBR95</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2730" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_cr800ent/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>338990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/209/209f6e7ba52d42f3ff094d1357ae1ce9.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness CR800ENT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2731" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_r1x/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>149890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/de0/de073262e318b7b47abf7c95539fb79b.jpg</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр MATRIX R1X</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2732" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_u7xe_2012/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>499890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ca9/ca911d2c95be373dc001b9bcae46139e.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix U7XE (2012)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2733" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_xbr25/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>91590</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e32/e323d93b3b0dcde759d589f8c9ead33f.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness XBR25</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2734" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_cu800ent/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>307990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/aea/aeaf13ec36374951961daf8971d5a8c6.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness CU800ENT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2735" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_r3xe_2012/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>321890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5fd/5fdca302003c42e39a4b3d3788bcca9d.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix R3XE (2012)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2736" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_bronze_gym_u1001_pro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>145890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d19/d191d0bc126f8dbad19c1e42ffdb605f.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Велотренажер BRONZE GYM U1001 PRO</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2737" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_r7xi_v_05/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>599890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/10f/10fd3928a555e102db20d57edfb5b4bb.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix R7XI (v.05)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2738" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/vertikalnyy_veloergometr_matrix_u30xer/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>178490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3ca/3ca14c947b8616e64860951f1a04a0f8.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Вертикальный велоэргометр MATRIX U30XER</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2739" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/vertikalnyy_veloergometr_matrix_u50xir/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>237490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e6b/e6b25124a49bbae0103f00368087e30a.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Вертикальный велоэргометр MATRIX U50XIR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2740" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/vertikalnyy_veloergometr_matrix_u30xr/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>119490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b84/b846de390afd46c773d586e6147fae05.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Вертикальный велоэргометр MATRIX U30XR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2741" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/vertikalnyy_veloergometr_matrix_u50xr/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>148890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0a9/0a9085359331808f3738656d5c465ed7.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Вертикальный велоэргометр MATRIX U50XR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2742" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/gorizontalnyy_veloergometr_matrix_r30xr/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>137490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a91/a919f5ec7bd5f99016ac597e23fc74d3.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Горизонтальный велоэргометр MATRIX R30XR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2743" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloetrenazher_bronze_gym_r801_lc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>98890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d2a/d2acafe31f8f8d61542aa38bddd1710c.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Велоэтренажер BRONZE GYM R801 LC</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2744" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dlya_ruk_matrix_krankcycle/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>259890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a7c/a7ccac4de2ecf0fd88533236f1d6b082.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велотренажер для рук MATRIX KRANKcycle</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2745" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/gorizontalnyy_veloergometr_matrix_r50xr/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>166490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/120/12032d2706af6922b32f81214a3f00fd.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Горизонтальный велоэргометр MATRIX R50XR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2746" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/gorizontalnyy_veloergometr_matrix_r50xir/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>254490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8e3/8e3802b26c3519ed18af006674f1bba7.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Горизонтальный велоэргометр MATRIX R50XIR</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2747" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_xbr95_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>111990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/735/7352324e5e6c89d2a1e7d14ec311e62a.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness XBR95 (2017)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2748" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_xbr25_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>87990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ceb/cebfccfe4634a19e6ea685c7cce6542a.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness XBR25 (2017)</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2749" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_cr900/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>218990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1ca/1ca85311070089a8e4d35b5de4ec2229.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness CR900</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2750" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_xterra_ub150/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1d4/1d457cdc459a39e4547ba4c48d436ce2.png</picture>
<vendor>Xterra</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Xterra UB150</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2751" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_body_craft_r18/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>79990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8d5/8d53286b20fdff1427bafaabbc1fd15b.jpg</picture>
<vendor>BODY CRAFT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Body Craft R18</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2752" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_bronze_gym_u801_lc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>78890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1b2/1b2b7084e696961460c68956b79be9e3.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Велотренажер BRONZE GYM U801 LC</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2753" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_xbu55_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>89990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a46/a46cd17c5069df6ed9e94e3c3ab16935.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness XBU55 (2017)</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2754" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_cu900/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>179990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/816/816c942ff933a686bf76d0fc093ef1ea.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness CU900</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2755" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_infiniti_fb800ems/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/838/838c9a8fcaedaba251d89b990e333fb7.jpg</picture>
<vendor>INFINITI</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Infiniti FB800EMS</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2756" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_xbr55_2017/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/026/026c4ac4d13d10cf74708ef6155b30f4.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness XBR55 (2017)</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2757" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_bronze_gym_u901_pro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>106890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/16e/16e25cbcd62fe691d6c6eec3f35eff1a.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр BRONZE GYM U901 PRO</name>
<description></description>
<manufacturer_warranty>3 года.</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2758" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/gorizontalnyy_veloergometr_matrix_r30xer/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>195890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8b2/8b223c65090d6a0ee902e6d83bed4e69.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Горизонтальный велоэргометр MATRIX R30XER</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2759" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_xterra_sb150/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23590</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a7c/a7c8069d733194ed3ba3a476e15b078c.png</picture>
<vendor>Xterra</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Xterra SB150</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2760" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/spin_bayk_bronze_gym_s900_pro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>44890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8a1/8a13f386a7434ad0d3e8cca4231d2e6a.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Спин-байк BRONZE GYM S900 PRO</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2761" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/spin_bayk_matrix_es/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>88890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/230/2303c4db2dd4727f84e7ab904cf8f428.jpg</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Спин-байк MATRIX ES</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2762" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_cb900/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>109990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/33d/33dcfeae1a03094b101f20e8706f2cd8.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness CB900</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2763" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_bronze_gym_r1001_pro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>171490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a2d/a2d0aea17ab931632476302f4180333f.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Велотренажер BRONZE GYM R1001 PRO</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2764" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/spin_bayk_johnson_class_cycle_p8000/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>91890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9fa/9fa2e3ee878692b0788935aef7c49308.png</picture>
<vendor>Johnson</vendor>
<vendorCode></vendorCode>
<name>Спин-байк Johnson Class Cycle (P8000)</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2765" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/vertikalnyy_velotrenazher_nautilus_u626/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>46900</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4a7/4a7afcc449c3424adc12b2e037430f9d.jpg</picture>
<vendor>Nautilus</vendor>
<vendorCode></vendorCode>
<name>Вертикальный велотренажер Nautilus U626</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2766" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_b8505/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/104/1042732a83fbb72fd0dcadea0375004d.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC B8505</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2767" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_magnitnyy_sport_elit_hb_8174hp/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14750</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6d0/6d014289f48021a67f690337c4af7089.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер магнитный SPORT ELIT HB-8174HP</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2768" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_magnitnyy_royal_fitness_dp_420u/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>9990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/871/87118b64437d201d63d31b58d6d49440.jpg</picture>
<vendor>Royal Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер магнитный Royal Fitness DP-420U</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2769" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_r7xi_r7xi_04/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>639890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d12/d12b599fdf1594fd0f0d5a68aa7881ea.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix R7XI (R7XI-04)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2770" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_r1x_r1x_02/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>183890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b7d/b7d129267b20e89176b6ce08f60123bc.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр MATRIX R1X (R1X-02)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2771" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_sport_elit_se_950d/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14000</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0ad/0ad520a5c395b2f49447f3432da5f06f.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SPORT ELIT SE-950D</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2772" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_body_sculpture_vs_3100g/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14100</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/714/71472bd9f1fdefb81d71627e5eec5ae6.jpg</picture>
<vendor>BODY SCULPTURE</vendor>
<vendorCode></vendorCode>
<name>Велотренажер BODY SCULPTURE ВС-3100G</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2773" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_magnitnyy_royal_fitness_dp_b038/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5c3/5c3baf8d6d5ee5fc596f7a506025ebab.jpg</picture>
<vendor>Royal Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер магнитный Royal Fitness DP-B038</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2774" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_body_sculpture_vs_6760_g/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23200</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0a3/0a34a4183d71266fa6fafac248de0b09.jpg</picture>
<vendor>BODY SCULPTURE</vendor>
<vendorCode></vendorCode>
<name>Велотренажер BODY SCULPTURE ВС-6760 G</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2775" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_cr900ent/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>218990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3cf/3cfd0ce7c2dd3c4bbcac0750643a4f19.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness CR900ENT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2776" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/gorizontalnyy_velotrenazher_nautilus_r626/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59900</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/782/782a303ae06a940e7dcb05aa4aebe745.jpg</picture>
<vendor>Nautilus</vendor>
<vendorCode></vendorCode>
<name>Горизонтальный велотренажер Nautilus R626</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2777" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_matrix_u7xi_u7xi_04/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>639890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/053/0532e0772a0a95886b28e4a706755bd4.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Matrix U7XI (U7XI-04)</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2778" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/spin_bayk_matrix_v_series/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>112990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b3d/b3db70dca5ca4db2f12f59493990169c.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Спин-байк Matrix V Series</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2779" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/spin_bayk_evo_fitness_racer_18/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/607/6074e225ac24278cafd763c179f2cebb.jpg</picture>
<vendor>EVO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Спин-байк EVO FITNESS Racer 18</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2780" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_body_sculpture_vs_6790g/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17720</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7df/7dfa111a9c12b1aedd28b565045ac285.jpg</picture>
<vendor>BODY SCULPTURE</vendor>
<vendorCode></vendorCode>
<name>Велотренажер BODY SCULPTURE ВС-6790G</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2781" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/krosstrener_nordictrack_commercial_vr21/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a84/a840b5b9eb56b0f5ef46bccd3fe09540.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Кросстренер NordicTrack Commercial VR21</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2782" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/vertikalnyy_velotrenazhyer_ammity_ocean_ob_40/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>85000</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/305/3051fcad5345b3533fbe12aec4be2574.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Вертикальный велотренажёр AMMITY Ocean OB 40</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2783" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_sport_elit_se_500d/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18170</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/aab/aab5324fa51975c98828a216d61ab22f.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SPORT ELIT SE-500D</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2784" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/spin_bayk_vision_es80/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>88890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7e9/7e961c29b2f5474afaf30a4058172260.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Спин-байк VISION ES80</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2785" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_elektromagnitnyy_evo_fitness_yuto_el/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/54c/54c239ce2fd2e23aa761efadfc95bb01.jpg</picture>
<vendor>EVO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Велотренажер электромагнитный EVO FITNESS Yuto EL</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2786" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_magnitnyy_royal_fitness_dp_418u/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>9490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/831/8316cc7f25f1adfb3e7a12651ba116a9.jpg</picture>
<vendor>Royal Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер магнитный Royal Fitness DP-418U</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2787" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spirit_fitness_cu900ent/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>308700</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c27/c27411687bffca6d05a1e1f124be7ebe.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spirit Fitness CU900ENT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2788" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_b3_2_chernyy_serebristyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>8390</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c08/c08d3af0ae30859ea83e6a2fd51433e5.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC B3.2 черный/серебристый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2789" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/spin_bayk_bronze_gym_s800_lc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6b6/6b6a6ebd17f26c90899e581b1a989799.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Спин-байк BRONZE GYM S800 LC</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2790" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_sport_elit_se_601/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13570</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fd0/fd0dbaaa34dafda6c5c0714a13b56de1.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SPORT ELIT SE-601</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2791" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_elektromagnitnyy_energetics_ct_431_pa/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/500/5006477e69f437c95a9b3d959141d4e5.jpeg</picture>
<vendor>Energetics</vendor>
<vendorCode></vendorCode>
<name>Велотренажер электромагнитный ENERGETICS CT 431 PA</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Швейцария</country_of_origin>
</offer>
<offer id="2792" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_magnitnyy_evo_fitness_arlett/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>9990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/cd3/cd3aa148f835d02402778790621b9991.jpg</picture>
<vendor>EVO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Велотренажер магнитный EVO FITNESS Arlett</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2793" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_applegate_b22_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b59/b591f53707add5d7a8ed0b998d8b8b15.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Велотренажер APPLEGATE B22 M</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2794" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_magnitnyy_energetics_ct_111p/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>8990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5d9/5d99bf042036825acc4d10f46ca0d03a.jpg</picture>
<vendor>Energetics</vendor>
<vendorCode></vendorCode>
<name>Велотренажер магнитный ENERGETICS CT 111P</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Швейцария</country_of_origin>
</offer>
<offer id="2795" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_svensson_industrial_go_u65/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>85990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9c9/9c9aaaa3ae4f324f56db4ab1cc1e4117.png</picture>
<vendor>Svensson Industrial</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SVENSSON INDUSTRIAL GO U65</name>
<description></description>
<manufacturer_warranty>Рама - , Приводная система -</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2796" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/vertikalnyy_veloergometr_horizon_citta_bt5_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/881/8811385e8550ba32aea2794b96c53971.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Вертикальный велоэргометр HORIZON CITTA BT5.0</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2797" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_sport_elit_se_4610/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14260</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c19/c198e147e2c44015460f93f36abd3a0c.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SPORT ELIT SE-4610</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2798" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_magnitnyy_evo_fitness_yuto/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/118/1189e53a463687e81da455e181e86cdc.jpg</picture>
<vendor>EVO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Велотренажер магнитный EVO FITNESS Yuto</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2799" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_sport_elit_se_800p/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20960</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/39f/39fc0e2ffcd735556515e8785f03f1fd.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SPORT ELIT SE-800P</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2800" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_svensson_industrial_force_r750/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>139990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1b3/1b387f4694c61b601088561b2e9d1001.png</picture>
<vendor>Svensson Industrial</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SVENSSON INDUSTRIAL FORCE R750</name>
<description></description>
<manufacturer_warranty>Рама - , Приводная система -</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2801" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_horizon_comfort_r_viewfit/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>70890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ea2/ea2457e027ef1b4ae0ad7da1e3c8b6cc.jpg</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр HORIZON COMFORT R VIEWFIT</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2802" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_bronze_gym_r901_pro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>139890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/62a/62a33c4e2401b5f48036366be30a40b2.png</picture>
<vendor>Bronze Gym</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр BRONZE GYM R901 PRO</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2803" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/vertikalnyy_veloellipsoid_ammity_ocean_ob_50/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>94000</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6ce/6ce4c47c4c745bcadef3d9c344becb67.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Вертикальный велоэллипсоид AMMITY Ocean OB 50</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2804" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_gorizontalnyy_sport_elit_se_503r/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24510</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/328/328fa6e4595b4226b907758efd950193.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер горизонтальный SPORT ELIT SE-503R</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2805" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_gorizontalnyy_sport_elit_se_601r/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14090</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/62e/62e60dd7b19f164ebf9b7e4494ee4b9a.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер горизонтальный SPORT ELIT SE-601R</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2806" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_svensson_industrial_force_r750_lx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>159990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/419/4199595d6c69f7fa3ce0b51a1bf010c9.png</picture>
<vendor>Svensson Industrial</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SVENSSON INDUSTRIAL FORCE R750 LX</name>
<description></description>
<manufacturer_warranty>Рама - , Приводная система -</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2807" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_applegate_b32_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/117/117145de89d1d83b8ddf3049a640688a.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Велотренажер APPLEGATE B32 M</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2808" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/krosstrener_nordictrack_gx_4_4_pro/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>44990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/133/133ef2f9636a916e210b665a2ebff9d2.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Кросстренер NordicTrack GX 4.4 Pro</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2809" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/spin_bayk_basic_fitness_8708p/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/78f/78fefcfd73ecee9e48af1e5820edaf2b.jpg</picture>
<vendor>Basic Fitness</vendor>
<vendorCode></vendorCode>
<name>Спин-байк BASIC FITNESS 8708P</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2810" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_svensson_industrial_go_r65/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>113990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e8a/e8a4769b6b4f6f052eeef5106e9e77f5.png</picture>
<vendor>Svensson Industrial</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SVENSSON INDUSTRIAL GO R65</name>
<description></description>
<manufacturer_warranty>Рама - , Приводная система -</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2811" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_sport_elit_se_400/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>11260</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/535/53509f3e1d33cd86ef60b37408f64088.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SPORT ELIT SE-400</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2812" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_body_sculpture_vs_2920hko_h_magnitnyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>10220</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0d3/0d385939af1849528fbc43daa2655160.jpg</picture>
<vendor>BODY SCULPTURE</vendor>
<vendorCode></vendorCode>
<name>Велотренажер BODY SCULPTURE ВС-2920HKO-H (магнитный)</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2813" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/vertikalnyy_velotrenazher_clear_fit_crosspower_cb_200/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/39f/39f3fff4f1c2f2b0a128f43492a09eca.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Вертикальный велотренажер Clear Fit CrossPower CB 200</name>
<description></description>
<manufacturer_warranty>2</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2814" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/gorizontalnyy_velotrenazher_clear_fit_crosspower_cr_200/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/845/845adf15bdbc399e1c7bb53bfcb4aa2a.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Горизонтальный велотренажер Clear Fit CrossPower CR 200</name>
<description></description>
<manufacturer_warranty>2</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2815" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_applegate_b22_a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/103/1034f2b7e45e349e8b6c4c21bb3ba920.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Велотренажер APPLEGATE B22 A</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2816" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_xterra_mb550/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>43990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/802/80270b7cdcbde3da5212a85563cc2ca6.png</picture>
<vendor>Xterra</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Xterra MB550</name>
<description></description>
<manufacturer_warranty>2 года при регистрации на сайте</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2817" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_vt_8302r_b8302/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/42f/42fc6c8a5bb497acd2dee4b2fb72bb16.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC VT-8302R / B8302</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2818" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/horizon_s3_spin_bayk/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bad/bad428a89f01217070d3fd2f7436dd46.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Horizon S3+ Спин-байк</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2819" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_magnitnyy_evo_fitness_spirit/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e96/e960e402ddd451daa7214a689b7de79d.jpg</picture>
<vendor>EVO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Велотренажер магнитный EVO FITNESS Spirit</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2820" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_v8729/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/826/826578c8293017c5c949673a19c9b8e2.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC В8729</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2821" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_svensson_industrial_force_u750_lx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>129990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e28/e28a665da86fe5c1e048289b6a24101d.png</picture>
<vendor>Svensson Industrial</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SVENSSON INDUSTRIAL FORCE U750 LX</name>
<description></description>
<manufacturer_warranty>Рама - , Приводная система -</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2822" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_applegate_b52_a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9ed/9ed62875e98b3939bceffc4930fa26fc.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Велотренажер APPLEGATE B52 A</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2823" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/gorizontalnyy_velotrenazhyer_ammity_dream_dr_30/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/994/994eb3dc1b68382aaf0b532132dfa801.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Горизонтальный велотренажёр AMMITY Dream DR 30</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2824" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_applegate_b32_a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>25490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6e9/6e9eb21deca937c5316acb02e212e1f4.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Велотренажер APPLEGATE B32 A</name>
<description></description>
<manufacturer_warranty>Рама - 1 год, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2825" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_v8715p12/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4fb/4fbdc9dec78e8c061938d3bcee790f9f.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC В8715P12</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2826" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_adidas_c_16_bike/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ced/cede5f0948a554de993ac7a938efc9c1.jpg</picture>
<vendor>Adidas</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Adidas C-16 bike</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2827" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/vertikalnyy_velotrenazher_sole_lcb_2016/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>88300</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/831/83118c6a8543e3f49e0a4706373239c4.png</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Вертикальный велотренажер Sole LCB (2016)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2828" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_svensson_industrial_force_u750/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>109990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/027/027fa054175694d0dfeb00074b5c3048.png</picture>
<vendor>Svensson Industrial</vendor>
<vendorCode></vendorCode>
<name>Велотренажер SVENSSON INDUSTRIAL FORCE U750</name>
<description></description>
<manufacturer_warranty>Рама - , Приводная система -</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2829" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_b87075/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c2b/c2b63d60d5517bee0233e3ca0715aeed.jpg</picture>
<vendor></vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC B87075</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2830" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_pro_form_tdf_centenial/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>89990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/472/4725151eade51850fef05f8a769ce145.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Pro-Form TDF Centenial</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2831" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_dender_alvine/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/201/2015704b1aabe70673f82bc3c1bdf2fa.jpg</picture>
<vendor>Dender</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр Dender Alvine</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2832" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/spin_bayk_horizon_elite_ic7_1/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>64890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/293/2931c36d9598c89f608d43c2fbc01c4f.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Спин-байк Horizon ELITE IC7.1</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2833" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/gorizontalnyy_velotrenazhyer_ammity_dream_dr_40/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>64990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b04/b04a799bfdf3c5025d58426e56aa5b5a.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Горизонтальный велотренажёр AMMITY Dream DR 40</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2834" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_b86021/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/87c/87cbde7e42545094404c126ce0c0c9c9.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC B86021</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2835" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_pro_form_210_csx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>22990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1a8/1a81320322d59df5883ce31667e56041.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Pro-Form 210 CSX</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2836" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_magnitnyy_energetics_ct_520_pc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7b3/7b3e6b968b679903111e943b6f6b0d7e.jpg</picture>
<vendor>Energetics</vendor>
<vendorCode></vendorCode>
<name>Велотренажер магнитный ENERGETICS CT 520 pc</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Швейцария</country_of_origin>
</offer>
<offer id="2837" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spin_bayk_proxima_velos/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/72b/72b1e8b1cd7f89ee10f9f197e1dac18b.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Велотренажер спин-байк PROXIMA VELOS</name>
<description></description>
<manufacturer_warranty>2 года. Рама, маховик - 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2838" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_vt_8301_b8301/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9ec/9ec4c55a1d4c53aa15a6af8bf672a918.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC VT-8301 / B8301</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2839" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/kommercheskiy_velotrenazhyer_ammity_pro_acb_7000/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>110000</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ae9/ae9f8cdebbf6a9b87953785ef1575e9a.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Коммерческий велотренажёр AMMITY PRO ACB 7000</name>
<description></description>
<manufacturer_warranty>2 + 1 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2840" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_gorizontalnyy_dfc_b8719rp/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ac4/ac4586067ce4ce30de1595261b52b0c0.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер горизонтальный DFC B8719RP</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2841" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/gorizontalnyy_velotrenazher_sole_lcr_2016/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>107900</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b0f/b0fb05743e98b64adeafc05a1bf7c497.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Горизонтальный велотренажер Sole LCR (2016)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2842" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/spinbayk_sb900/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>83100</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/042/0423668402a6c2440e969f865dd9cf39.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Спинбайк SB900</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2843" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_hasttings_dbu40/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35290</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9b5/9b50b83ba2bc0eea9b140fffa980d985.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Hasttings DBU40</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2844" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_b8731r/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>33990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a00/a0008d9fca8c225109db483ff6b914b2.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC B8731R</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2845" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_body_sculpture_bc_1720_g/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>10760</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fcc/fccd03f4c068a4248fb8ffa4e83c0b99.jpg</picture>
<vendor>BODY SCULPTURE</vendor>
<vendorCode></vendorCode>
<name>Велотренажер BODY SCULPTURE BC-1720 G</name>
<description></description>
<manufacturer_warranty>18 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2846" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_v8729r/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5de/5ded79297cb132884598ab1fd0f19b19.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC В8729R</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2847" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_vision_u40_touch/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>164890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ee7/ee75de81f61b49e29871917fc2788087.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр VISION U40 TOUCH</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2848" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_nordictrack_gx_5_4/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b73/b73bdeac0778dff8ee1a12c5d81ced80.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Велотренажер NordicTrack GX 5.4</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2849" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_body_craft_vector_6/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>79990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/448/4483d3a658d60b26df7c4985f88eca3f.jpg</picture>
<vendor>BODY CRAFT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Body Craft Vector 6</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2850" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_nordictrack_gx_5_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/28c/28c16b15cbe697cc843df31beb0427d2.jpg</picture>
<vendor></vendor>
<vendorCode></vendorCode>
<name>Велотренажер NordicTrack GX 5.0</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2851" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_b8715r/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2cf/2cff0359123071a7308344a4e1cff7d0.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC B8715R</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2852" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_horizon_comfort_5_viewfit/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>55490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f77/f7717757be8e16392c19822ef2781750.jpg</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр HORIZON COMFORT 5 VIEWFIT</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2853" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/gorizontalnyy_velotrenazher_nautilus_r628/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>83900</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fee/fee9717ce8976765a4ee106670da286d.jpg</picture>
<vendor>Nautilus</vendor>
<vendorCode></vendorCode>
<name>Горизонтальный велотренажер Nautilus R628</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2854" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spinning_bike_dfc_v10_b10/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/768/7684250f32dd1ea801d37f679a875c95.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spinning Bike DFC V10 / B10</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2855" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_hasttings_dbu60/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>47190</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/dcb/dcbe3735248fea118d3afbcea3bb44eb.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Hasttings DBU60</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2856" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_gorizontalnyy_lifespan_r7000i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4e8/4e8a9946e46333f3050ba87c58abd1a3.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер горизонтальный LifeSpan R7000i</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2857" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_vision_r40_classic/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>144890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/687/687564034f5554edbe67dad3bb52792c.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр VISION R40 CLASSIC</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2858" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_body_craft_bcr200/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>79990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/aab/aabb53d7258df31a79042419b74cdd60.jpg</picture>
<vendor>BODY CRAFT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Body Craft BCR200</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2859" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_b8732/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b3e/b3ea760ea600b4f9104daafd3ffc9824.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC B8732</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2860" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_vertikalnyy_lifespan_c7000i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99000</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/658/6583190fee11074ad8b39802ff537d79.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер вертикальный LifeSpan C7000i</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2861" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_b8711r/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/697/697f472ce9786e347bbeb30f1facd7c6.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC B8711R</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2862" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_b3005/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/11c/11ceab99d367f95366bda4d1db94ec87.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC B3005</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2863" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/gorizontalnyy_velotrenazher_sole_lcr/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>96600</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ffd/ffd1956c94417ab72f5ac7d693159e9e.jpg</picture>
<vendor>Sole Fitness</vendor>
<vendorCode></vendorCode>
<name>Горизонтальный велотренажер Sole LCR</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2864" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/vertikalnyy_velotrenazher_nautilus_u628/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69900</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/967/967de3224a3f33c687319a389e6bb5d4.jpg</picture>
<vendor>Nautilus</vendor>
<vendorCode></vendorCode>
<name>Вертикальный велотренажер Nautilus U628</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2865" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_b3_2r/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>11990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/65f/65f506934e67741aa2029c617d66b4a4.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC B3.2R</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2866" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_hasttings_rb400_ufo/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4e8/4e81290c6c5c87f3780d900669a6593f.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Hasttings RB400 UFO</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2867" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_hasttings_wega_s300/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1cd/1cd64e204e590bdf608f936b9af1ab5d.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Hasttings Wega S300</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2868" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_pro_form_310_csx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/308/308ff44e3f398bb97d8c9a42da9199cd.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Pro-Form 310 CSX</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2869" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_pro_form_245_zlx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/332/33214d3b739cd24648d3dcc61a4093c1.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Pro-Form 245 ZLX</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2870" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/krosstrener_nordictrack_r110/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>67990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c60/c60e695c89b3a8c1e07afa303e00182e.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Кросстренер NordicTrack R110</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2871" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_pro_form_tdf_1_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/05f/05f853b1a57c2057c33d45b21e32bf22.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Pro-Form TDF 1.0</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2872" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_b5250/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/100/100550e95abb7bfae1d583fe71c9cea0.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC B5250</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2873" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_pro_form_225_csx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a97/a97b9803b7f27f6a26b583a5d74eebc1.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Pro-Form 225 CSX</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2874" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_diamond_fitness_x_silver_el/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17690</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c79/c79fbf17ace785f44b9e3779843f0e2a.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Diamond Fitness X-Silver EL</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2875" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_hasttings_dbu20/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31405</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2aa/2aa5d8e209d4dd412eaa09b7b14a835c.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Hasttings DBU20</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2876" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_energetics_ct_520_pc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fb6/fb67f96a0757eea6e879384fd70878cf.jpg</picture>
<vendor>Energetics</vendor>
<vendorCode></vendorCode>
<name>Велотренажер ENERGETICS CT 520 pc</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2877" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_pro_form_tdf_5_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>139990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/207/20729da8d1a5a2e02082eadd527988f1.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Pro-Form TDF 5.0</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2878" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_pro_form_325_csx/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/743/74347b4c92861a959477fb0f4d7828bc.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Pro-Form 325 CSX</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2879" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_b87042/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3b4/3b40ae082601dcc387a283c218420910.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC B87042</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2880" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_vision_r20_classic/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fcd/fcdfc0565009fb2cc8632eec9c3e9149.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр VISION R20 CLASSIC</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2881" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_horizon_comfort_3_new/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>47490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0a6/0a663a2829ba8fdbf96711842a69168e.jpg</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр HORIZON COMFORT 3 NEW</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2882" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_vision_u20_classic/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f9c/f9c66e968e97a4857f1ef3d0fd1b6db8.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр VISION U20 CLASSIC</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2883" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_vision_r40_touch/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>229890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1cc/1ccab5679edb70931b007f43d5ea81b4.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр VISION R40 TOUCH</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2884" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_vision_u40_elegant/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>129890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/510/51084f03f7cac88884e3040ec8048947.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр VISION U40 ELEGANT</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2885" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_vision_r40_elegant/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>179890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/574/574e074a6b92aacb9436c662146c79b4.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр VISION R40 ELEGANT</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2886" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_vision_u20_touch/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>139890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a6b/a6b93aaaf5de36609effba6e5c7426d8.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр VISION U20 TOUCH</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2887" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_vision_r20_touch/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>169890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/235/235cb7a5001692004e96d47c21902f3f.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр VISION R20 TOUCH</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2888" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_clear_fit_gb_40_ego/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1c6/1c69105f07ecbc78fce1e53430a582e4.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер — Clear Fit GB 40 Ego</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2889" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_diamond_fitness_x_swing_el/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3b4/3b4f63a9071f020d7f3a9c7b9eb17eec.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Diamond Fitness X-Swing EL</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2890" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_zipro_fitness_prime/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>10590</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a7d/a7d42806b32a3d62ae5f418e32b52196.jpg</picture>
<vendor>ZIPRO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Велотренажер ZIPRO FITNESS Prime</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2891" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_vision_u40_classic/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/158/158e6a5c4cde50f51cd9aa3aa8016ec6.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр VISION U40 CLASSIC</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2892" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_hasttings_sb3_0/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a46/a46313c7a5dfd5f9d6bd3b603888ad61.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Hasttings SB3.0</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2893" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_diamond_fitness_x_swing/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/aee/aee00dd83eae9c04535d7fc0155e8cf8.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Diamond Fitness X-Swing</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2894" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_vision_u20_elegant/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>99890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e1c/e1c5c47bb8b750e3279a06452e5603e9.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр VISION U20 ELEGANT</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2895" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_hasttings_sb400_spider/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/276/27683fa80dc14702900a74b12e083f29.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Hasttings SB400 SPIDER</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2896" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_hasttings_sb300_spider/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c7f/c7f92280564b7d8171f6b10731f6bc69.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Hasttings SB300 SPIDER</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2897" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_vision_r20_elegant/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>134890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4c8/4c829fe45f64ce98137681db443aaf96.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр VISION R20 ELEGANT</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2898" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_pro_form_425_zlx_recumbent/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/026/0261999e3bfd5280d76433319ac6c9ac.jpg</picture>
<vendor>PRO-FORM</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Pro-Form 425 ZLX Recumbent</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2899" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_nordictrack_gx4_1/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32290</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ab5/ab5caae222134f76f539530ecbf4d7b0.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Велотренажер NordicTrack GX4.1</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2900" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_vision_u60/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>109890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b3c/b3ca5b574e6bf8f1569e19f5dd037e1e.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр VISION U60</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2901" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_zipro_fitness_drift/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c25/c25d86196f2cb896bd74e8fd361d71cf.jpg</picture>
<vendor>ZIPRO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Велотренажер ZIPRO FITNESS Drift</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2902" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_b5015/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/21d/21da71751bff74386c8eb9fd9574fcf3.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC B5015</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2903" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_nordictrack_r105/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/285/285c440165c8312840decc78bf37d78c.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Велотренажер NordicTrack R105</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2904" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_clear_fit_gb_50_ego/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>69990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a0d/a0d7ddb5bfaa8d55a097d9cf9eb994f3.jpg</picture>
<vendor>CLEAR FIT</vendor>
<vendorCode></vendorCode>
<name>Велотренажер — Clear Fit GB 50 Ego</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2905" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_zipro_fitness_beat/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/86b/86badd1ee186ad974d9e636958d0fdcb.jpg</picture>
<vendor>ZIPRO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Велотренажер ZIPRO FITNESS Beat</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2906" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_vision_r60/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>139890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2d3/2d35c22087093f37592d0854ec5b7793.png</picture>
<vendor>Vision</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр VISION R60</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2907" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_nordictrack_vxr400/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>44990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8e0/8e0b0a5274ec81f6b917b946816bf48c.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Велотренажер NordicTrack VXR400</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2908" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_diamond_fitness_x_silver/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15290</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/20e/20ee0250b1bda10761533978106c265e.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Diamond Fitness X-Silver</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2909" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_nordictrack_vx550/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d4c/d4cd9eb48ff8174e03f06bbcea8a93dc.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Велотренажер NordicTrack VX550</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2910" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_hasttings_wega_rs400/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>45990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d50/d50f6fe147290d10700bd6051551bd66.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Hasttings Wega RS400</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2911" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_hasttings_wega_s3/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/046/04678ca280c9f8734c433862cf42b916.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Hasttings Wega S3</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2912" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_pluton_b5010/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>11590</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/81f/81fdf52bbe3d3542a8624b3f9a5e2ebb.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC PLUTON B5010</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2913" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_nordictrack_r65/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bd0/bd0f9dda167dab5be97c04af70460f39.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Велотренажер NordicTrack R65</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2914" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_cb001m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>25990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/371/371601bd12bf72778af16af5055a5fbb.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC CB001M</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2915" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_carbon_u704/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5dd/5dd0af8beb856c2783a791527c1300cb.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр CARBON U704</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2916" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_spinning_bike_dfc_v10/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/901/901e6ba56e72206f98293b828c201b18.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер Spinning Bike DFC V10</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2917" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_b8508/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>10990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/341/34134e249ef19ae12ef66f31ac4d8d15.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC B8508</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2918" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_zipro_fitness_one/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>9890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b41/b411a3349173564670fc408d108fe9e1.jpg</picture>
<vendor>ZIPRO FITNESS</vendor>
<vendorCode></vendorCode>
<name>Велотренажер ZIPRO FITNESS One</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2919" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_nordictrack_u60/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>44990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bc7/bc7f90ae13e73d97ef2769f994657880.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Велотренажер NordicTrack U60</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2920" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_nordictrack_vx400/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/501/501fe6595e5b1524772397532302d3a7.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Велотренажер NordicTrack VX400</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2921" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_pt_001m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/439/43941adb8e2e25233d3f158340e33b14.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC PT-001M</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2922" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_pt_02mb/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13490</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/45e/45e218f942315bba7608e3874b4e919f.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC PT-02MB</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2923" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/veloergometr_carbon_u804/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/201/2018133fc0cced1a832e0503a97c9aa4.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Велоэргометр CARBON U804</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2924" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_cb001/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>22990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7f4/7f4e7234182fe9e62102ba1f647289af.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC CB001</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2925" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_carbon_u200/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bc2/bc2d53acc3d602263b5d695c89030600.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Велотренажер CARBON U200</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2926" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_nordictrack_vx_450/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/265/265190930ce10dc2c3f2c65d44fbf90b.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Велотренажер NordicTrack VX 450</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2927" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_nordictrack_vxr_475/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8ce/8ce761a004dc5bdaccd7accd9c37a9b4.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Велотренажер NordicTrack VXR 475</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2928" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_vt_8302r/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f32/f324067e2322e14ac39ac740609803ef.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC VT-8302R</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2929" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_dfc_vt_8301/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/111/11170db9982c7ad24c1e9fb0ba1ef5e8.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Велотренажер DFC VT-8301</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2930" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_carbon_u304/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16990</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9cc/9cca38ee031305d07d9e8d8277745237.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Велотренажер CARBON U304</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2931" available="true">
<url>http://sportzastava.ru/catalog/velotrenazhery/velotrenazher_carbon_u100/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>9890</price>
<currencyId>RUB</currencyId>
<categoryId>156</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8cd/8cd8911c99796a9af1f907309d1ae199.png</picture>
<vendor>Carbon</vendor>
<vendorCode></vendorCode>
<name>Велотренажер CARBON U100</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2932" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_proxima_remos_fw_658a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>84990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/198/198cadc44ee2920b7218df919742b413.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер PROXIMA Remos FW-658A</name>
<description></description>
<manufacturer_warranty>2 года. Рама, маховик - 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2933" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_applegate_r10_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/82a/82ad9ed6ace0407b77339a76d1b0b995.png</picture>
<vendor>AppleGate</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер APPLEGATE R10 M</name>
<description></description>
<manufacturer_warranty>Рама - 2 года, Приводная система - 1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2934" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_oxygen_typhoon_hrc/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39890</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d56/d56202f93788312e22454c0e00b53ac7.png</picture>
<vendor>Oxygen</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер OXYGEN TYPHOON HRC</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2935" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_spirit_fitness_crw800/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>107990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/098/098ffd4b5ce0ba91493f1fefbe5ec566.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер Spirit Fitness CRW800</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2936" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_matrix_new_rower/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>158890</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4ab/4ab77603fc7414a71e3df2334018f98b.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер MATRIX NEW Rower</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2937" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_infiniti_rx100/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>72990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/200/200c6e80b548c12acd70f20a82578545.jpg</picture>
<vendor>INFINITI</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер Infiniti RX100</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2938" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_infiniti_r200/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>79990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/cf8/cf8653b534192f89bd599c52128f5a5f.jpg</picture>
<vendor>INFINITI</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер Infiniti R200</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2939" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_infiniti_r70/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ffa/ffa94bc4019a866b8c97f6aadd5706c7.jpg</picture>
<vendor>INFINITI</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер Infiniti R70</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2940" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_infiniti_r9_novyy_kompyuter_se9_ir/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>59990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/071/071cf70a09a3f5122135961c7ccd25ef.jpg</picture>
<vendor>INFINITI</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер Infiniti R9 новый компьютер SE9-IR</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2941" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_matrix_rower/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>119890</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/810/8106916261cc59f16f9fe6c37b7a4eb8.png</picture>
<vendor>Matrix</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер MATRIX Rower</name>
<description></description>
<manufacturer_warranty>5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2942" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_spirit_fitness_xrw600/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>71990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ccf/ccf285f02236dd82d064830279dae3b9.png</picture>
<vendor>Spirit Fitness</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер Spirit Fitness XRW600</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2943" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_dfc_r7108p/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/aae/aaec7bcfc7585472d53b1037f31a0a1d.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер DFC R7108P</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2944" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_dfc_r7108/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c03/c038602b1bbd2a30b339bb237d3484b6.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер DFC R7108</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2945" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazhyer_ammity_ocean_orm_5000/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>85000</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/669/669f9117ab1bb8cf22d5eaba0d775dd7.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажёр AMMITY Ocean ORM 5000</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2946" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_infiniti_r200amp/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>79990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/123/123737ee5e812af7efb15e9114700551.jpg</picture>
<vendor>INFINITI</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер Infiniti R200AMP</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2947" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_dfc_r8001/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>47990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/eec/eecc5e08783a31131919f25514261d98.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер DFC R8001</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2948" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_xterra_erg200/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>22490</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e5f/e5f02406eecfd0e94a661bdb4b2b0106.png</picture>
<vendor>Xterra</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер Xterra ERG200</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2949" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_dfc_r8003/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/125/1250801013dfe014ed32b11fb7cfa87d.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер DFC R8003</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2950" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_dfc_a43_r403a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1b1/1b1c1995a7187a741386342f9521dd5a.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер DFC A43 / R403A</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2951" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_dfc_r71061/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ca2/ca2c0ee9f544e5f0cb39ca5ca968149d.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер DFC R71061</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2952" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_hasttings_wega_r100/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b16/b16ebf7b7503848b827cd2d57c13675a.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер Hasttings Wega R100</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2953" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_infiniti_r70i/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2ca/2ca6413960a180ae14c497ebd56a5a27.jpg</picture>
<vendor>INFINITI</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер Infiniti R70i</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2954" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazhyer_ammity_ocean_orm_4000/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>58990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e13/e13ab5c4b4d8f04c37439cca350cfe84.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажёр AMMITY Ocean ORM 4000</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2955" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_dfc_r7103/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/25c/25c24ff36324f7e6ebd43914692b927c.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер DFC R7103</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="2956" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_proxima_remos_ii_art_fw_6582a/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>94990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8f9/8f9d7329a5148975926bb45e26cb0a8e.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер PROXIMA Remos II арт FW-6582A</name>
<description></description>
<manufacturer_warranty>2 года. Рама, маховик - 5 лет</manufacturer_warranty>
<country_of_origin>Тайвань</country_of_origin>
</offer>
<offer id="2957" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazhyer_ammity_ocean_orm_3000/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8e5/8e56f2e25df64e2aa1c335e04d77cc40.jpg</picture>
<vendor>AMMITY</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажёр AMMITY Ocean ORM 3000</name>
<description></description>
<manufacturer_warranty>3 + 2 (расширенная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2958" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_dfc_r7104/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>11990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5c4/5c4d720539f12b6e7307af19b76f884a.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер DFC R7104</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2959" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_hasttings_wega_r1/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>54990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/12e/12ee9e7a8712667d1382c4a60ab8a0da.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер Hasttings Wega R1</name>
<description></description>
<manufacturer_warranty>2 года (1 год от производителя + 1 год* дополнительная)</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2960" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_dfc_a43/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/be5/be5db3b13e754bdb663c5f55fd77ed06.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер DFC A43</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2961" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_horizon_oxford_5/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>82490</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0d2/0d21b4451a4f88c4f8b9fcc5b896945d.png</picture>
<vendor>Horizon</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер HORIZON OXFORD 5</name>
<description></description>
<manufacturer_warranty>3 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2962" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_dfc_a73/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/092/0929547d4374dced161fd27dc9fdbe36.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер DFC A73</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2963" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_dfc_7103/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/33b/33b23e397e9fe18cf88d0d55be268da9.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер DFC 7103</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2964" available="true">
<url>http://sportzastava.ru/catalog/grebnye_trenazhery/grebnoy_trenazher_nordictrack_rx_800/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>37990</price>
<currencyId>RUB</currencyId>
<categoryId>157</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e82/e82a02c9f6f1c14d19884b9e4be58a33.jpg</picture>
<vendor>NORDICTRACK</vendor>
<vendorCode></vendorCode>
<name>Гребной тренажер NordicTrack RX 800</name>
<description></description>
<manufacturer_warranty>2 года</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2965" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_14_ft_s_zelenoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>55890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3ab/3abac70ebb0e1b9bbbe53b0168c5ada0.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 14 FT с зеленой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2966" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_14_ft_s_zeleno_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>55890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e21/e21ad5d0f9dce3d5f818975e89148f00.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 14 FT с зелено-желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2967" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_14_ft_s_sine_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>55890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1ab/1abf1eb10d517a8ae1f47025eb868632.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 14 FT с сине-желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2968" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_14_ft_s_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>55890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1d0/1d08ba1af4ab6b75cf34d26ac7320569.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 14 FT с желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2969" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_8_ft_s_sine_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6f2/6f220b76b53fb6068a95008249c1a191.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 8 FT с сине-желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2970" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_10_ft_s_siney_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ed3/ed39781c031192697b91a29b624fa4cd.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 10 FT с синей крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2971" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_8_ft_s_zelenoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ee9/ee92eceb05f9d82d3b1cd76b23dc364e.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 8 FT с зеленой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2972" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_12_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>30890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/792/792b1ee14506fc158e050108a3e298f4.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 12 FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2973" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_14_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/10f/10f46d22972a4353f94e394a6d9ebd4f.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 14 FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2974" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_14_ft_s_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>55890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/694/69444c91138e58fe14f7497200da6910.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 14 FT с желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2975" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_16_ft_s_siney_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>62890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f28/f28aaeaee1a80e593f9821608c024e78.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 16 FT с синей крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2977" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_6_ft_s_siney_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7c5/7c52026648a980e9612289a5544bfefc.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 6 FT с синей крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2978" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_jump_12_ft_zelenyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2f8/2f884b16e0700af9eb6adbe07fb79b41.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT JUMP 12 FT зеленый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2979" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_10_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/77b/77be0a6a170f3c2fbf8a2c3743252879.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 10 FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2980" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_8_ft_s_siney_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/440/44021b3e4ae546d6383d70930a38615f.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 8 FT с синей крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2981" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_10_ft_s_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/073/073eb46c3003244a483bfff57039c9aa.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 10 FT с желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2982" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_10_ft_s_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c3f/c3f3c9294b5691c596c044ad3f1f96cb.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 10 FT с желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2983" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_16_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>38890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/070/070c8d8b60f2bd22cd9239e71455a3bb.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 16 FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2984" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_12_ft_s_zeleno_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6ea/6ea2d0748da1128f5d6d3d4d264d7827.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 12 FT с зелено-желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2985" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_12_ft_s_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4a0/4a0ca917e8d172acc50917c438f04e0d.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 12 FT с желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2986" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_16_ft_s_zelenoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>62890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bef/bef7b486a038d056e4921f543342f78d.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 16 FT с зеленой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2987" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_jump_10_ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c5e/c5eab46e89caf076c4a485192e130e82.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT JUMP 10 FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2988" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_6_ft_s_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/023/02369d41acc41594603a9859e7866b48.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 6 FT с желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2989" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_jump_12_ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f37/f3790c13c7ad401636bc5a33d9e611b9.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT JUMP 12 FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2990" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_8_ft_s_zeleno_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/77a/77acced3d2a346b3cf91aaab3a95ea9f.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 8 FT с зелено-желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2991" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_8_ft_s_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bee/bee84716ad43d48f4dbe1987919f5567.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 8 FT с желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2992" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_12_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>30890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fa9/fa95b39e084eaa124f402e23111c6fe0.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 12 FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2993" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_jump_16_ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/af8/af8587270936e8e0dca9c7cbdba5f71e.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT JUMP 16 FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2994" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_10_ft_s_zelenoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/968/9682a12ee7b76c3e24f6c631d05e00af.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 10 FT с зеленой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2995" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_10_ft_s_zeleno_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f34/f34b8cb0151dc0640b6f4a2a149c01db.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 10 FT с зелено-желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2996" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_8_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/707/70769ad7a86b14699750d9935ee553e9.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 8 FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2997" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_sun_like_10_ft_zheltyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/19d/19d8fef2863cfd0baa2486874530819e.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT SUN LIKE 10 FT желтый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2998" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_6_ft_s_zeleno_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1e9/1e9739be957f7075c542394f1fa85bc7.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 6 FT с зелено-желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="2999" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_sun_like_8_ft_zheltyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/838/8389d2ede67f32921fea0d84e89697c9.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT SUN LIKE 8 FT желтый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3000" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_8_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/875/87578e86d30de52049a575535176522b.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 8 FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3001" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_jump_14_ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/31a/31a634bfb5efc7e11d19638f42353ac2.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT JUMP 14 FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3002" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_jump_14_ft_zelenyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/423/423adecae3f01f28d0fa200dcf9ea9f5.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT JUMP 14 FT зеленый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3003" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_sun_like_16_ft_zheltyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>38890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bae/bae46d3c94093ce507d6def28d6677b1.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT SUN LIKE 16 FT желтый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3004" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_16_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>38890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2c3/2c32ed9f6004b4e7d8ea827cb9baa6da.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 16 FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3005" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_12_ft_s_siney_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6e4/6e4332461e795bf784fce1beb9edd381.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 12 FT с синей крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3007" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_sun_like_12_ft_zheltyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>30890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bad/bad3a47601ff890419817622bc5f35bd.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT SUN LIKE 12 FT желтый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3008" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_16_ft_s_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>62890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f8d/f8ddbdb03a74b06049d37958bffa8629.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 16 FT с желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3009" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_6_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14390</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d58/d5851967a9df5807c7f1c8095701f998.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 6 FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3010" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_6_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14390</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b42/b4209f9fbc346c4260e26899bc17d89a.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 6 FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3011" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_6_ft_s_zelenoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f70/f70e93906589e1907f86b937d6aaf8e7.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 6 FT с зеленой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3012" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_6_ft_s_sine_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/379/379c0421aeaf4464da4540e880c3aa08.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 6 FT с сине-желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3014" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_yarton_16ft_zelenyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a8b/a8b3e3c3fec0e7ecda6865225cb395c7.jpg</picture>
<vendor>YARTON</vendor>
<vendorCode></vendorCode>
<name>Батут YARTON 16FT зеленый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3015" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_12_ft_s_sine_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8d6/8d6e268c87e19e2a4a56236714a8819e.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 12 FT с сине-желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3016" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_yarton_16ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e8e/e8e36758e5a1d88d9c207ae437a2c4c8.jpg</picture>
<vendor>YARTON</vendor>
<vendorCode></vendorCode>
<name>Батут YARTON 16FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3017" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_jump_8_ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/682/682d5bf3ffefa0571f6ca90c7f2ef197.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT JUMP 8 FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3018" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_16_ft_s_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>62890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c8f/c8fe15779e309cbb7f6bba5f742f309d.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 16 FT с желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3019" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_sun_like_6_ft_zheltyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14390</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4a1/4a132b946be7f7fa08b068609e3d5d22.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT SUN LIKE 6 FT желтый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3020" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_8_ft_s_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d7b/d7b80aa61ca1958ac91f6cde5606282c.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 8 FT с желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3021" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_12_ft_s_zelenoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/eca/eca4de5c694c69d5f75c8404877b64e9.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 12 FT с зеленой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3022" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_yarton_12ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/051/0517a6bea6c362605b28fd1972d6f5cc.jpg</picture>
<vendor>YARTON</vendor>
<vendorCode></vendorCode>
<name>Батут YARTON 12FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3023" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_10_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/99e/99e98fd593413cb412a1e1a5dd5aec16.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 10 FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3024" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_16_ft_s_sine_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>62890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/232/232877cee705c10fd24bd605a498f00f.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 16 FT с сине-желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3025" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_16_ft_s_zeleno_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>62890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/262/26239c6e8574891fd155a617590ffeee.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 16 FT с зелено-желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3026" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_green_12_ft_s_zheltoy_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/252/252411edbbadfd90cb86c5612ba3a789.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE GREEN 12 FT с желтой крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3027" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_jump_6_ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>10790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8a1/8a1300ab52f3cba06abbb13aaea4f860.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT JUMP 6 FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3028" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_jump_8_ft_zelenyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/db1/db156b48578e3d822bf2b00c63fa4b4f.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT JUMP 8 FT зеленый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3029" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_space_blue_12ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7d2/7d219048df9bc496e1eb658f22462dc7.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Space Blue 12FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3030" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_yarton_14ft_zelenyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e28/e28337ec624d720246f9bddfbe1c8b14.jpg</picture>
<vendor>YARTON</vendor>
<vendorCode></vendorCode>
<name>Батут YARTON 14FT зеленый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3031" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_yarton_14ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/14c/14c9798af8811bc9c51ebac4eea31875.jpg</picture>
<vendor>YARTON</vendor>
<vendorCode></vendorCode>
<name>Батут YARTON 14FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3032" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_bondy_sport_12ft_zelenyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/adc/adcd8d1543d29383badb595d2685929e.jpg</picture>
<vendor>BONDY SPORT</vendor>
<vendorCode></vendorCode>
<name>Батут BONDY SPORT 12FT зеленый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3033" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_jump_6_ft_zelenyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>10790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/071/0714db5cda4a0df51b6d4c8ecfbfe7cb.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT JUMP 6 FT зеленый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3034" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_diamond_fitness_external_12ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9b6/9b6030d174c90b47c9d73d20fda81bad.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Батут DIAMOND FITNESS External 12ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3035" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_diamond_fitness_black_edition_10ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6a8/6a83050971388a847f33532f83f0bc74.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Батут DIAMOND FITNESS Black Edition 10ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3036" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_space_green_12ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b96/b9696d3eb78c0e4f43064931ef91e977.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Space Green 12FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3037" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_space_green_14ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>22900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/94d/94d4d6be1a83db12160502408f4e64b6.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Space Green 14FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3038" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_diamond_fitness_external_16ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d11/d116a658a0c75a8964f4a3f339ecea4d.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Батут DIAMOND FITNESS External 16ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3039" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_space_green_16ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/521/5219a5ad9fc1d0f39ea3c5fd401323a9.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Space Green 16FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3040" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_fitness_s_setkoy_7ft_tr_e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>11490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e27/e27dd19b1bbdfbe53f4e72d0df57cd92.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE FITNESS С СЕТКОЙ 7FT-TR-E</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3041" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_i_jump_14ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/257/257ad27467000de86f3a4073fd5640ea.jpg</picture>
<vendor>i-JUMP</vendor>
<vendorCode></vendorCode>
<name>Батут i-JUMP 14ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3042" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_yarton_8ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16390</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ab1/ab14eb103537bb1b6a6328c06ae516d7.jpg</picture>
<vendor>YARTON</vendor>
<vendorCode></vendorCode>
<name>Батут YARTON 8FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3043" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_diamond_fitness_external_6ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>10790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1d6/1d658cb8f8fe020f5932704dc148d0c9.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Батут DIAMOND FITNESS External 6ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3044" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_like_blue_6_ft_s_siney_kryshey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/acb/acb8e42b4929e843600d6f6a740dab7b.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT LIKE BLUE 6 FT с синей крышей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3045" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_classic_green_4_6_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>36600</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c62/c628f523f20a37f681d6683eb30fac9f.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Classic Green (4,6 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3046" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_optifit_jump_10_ft_zelenyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bf9/bf9b1fdaf0afaa991a39e9e111734cc2.jpg</picture>
<vendor>OPTIFIT</vendor>
<vendorCode></vendorCode>
<name>Батут OPTIFIT JUMP 10 FT зеленый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3047" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_classic_green_3_66_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/cfc/cfc7508a06826158dc548d28ba68ae97.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Classic Green (3,66 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3048" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_kengoo_s_setkoy_6ft_tr_e_bas/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b40/b40b693fa10702179da8a2175b33a885.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE KENGOO С СЕТКОЙ 6FT-TR-E-BAS</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3049" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_fitness_s_setkoy_9ft_tr_e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1d0/1d0eea91c00963e5ffaa84c6859669d4.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE FITNESS С СЕТКОЙ 9FT-TR-E</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3050" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_kengoo_s_setkoy_8ft_tr_e_bas/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ceb/cebe922fec751579a2614141a7c6a427.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE KENGOO С СЕТКОЙ 8FT-TR-E-BAS</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3051" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_i_jump_16ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>33990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/98c/98cf8c9068018a6efab1b9cdc4900799.jpg</picture>
<vendor>i-JUMP</vendor>
<vendorCode></vendorCode>
<name>Батут i-JUMP 16ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="3052" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_14_ft_outside_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/31c/31ca1d18c34615a029df422c4bb61101.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 14 ft outside (green)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3053" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_classic_pink_1_82_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>11990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7d2/7d20aa3c662c38bfaabdc1f27e70c1c1.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Classic Pink (1,82 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3054" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_14_ft_inside_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e70/e709f1695b90db3d30ec1546a5200d17.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 14 ft inside (green)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3055" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_i_jump_10ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/64c/64c3d73ebb108bbfa3ad96aaa6c945b4.jpg</picture>
<vendor>i-JUMP</vendor>
<vendorCode></vendorCode>
<name>Батут i-JUMP 10ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3056" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_kengoo_s_setkoy_14ft_tr_e_bas/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e99/e99b4516d1f530ed1a8606c40501090d.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE KENGOO С СЕТКОЙ 14FT-TR-E-BAS</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3057" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_classic_green_2_44_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18690</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b09/b09795dd301e72b81d8387ee6058abb3.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Classic Green (2,44 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3058" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_8_ft_inside_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/634/6342d9c29baaff1c09cfbf7c7057f05c.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 8 ft inside (blue)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3059" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_space_green_10ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/753/7538565a1006852778952b02406932c9.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Space Green 10FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3060" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_yarton_6ft_zelenyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12390</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/147/147723b6171c8dafca3437efed55de6b.jpg</picture>
<vendor>YARTON</vendor>
<vendorCode></vendorCode>
<name>Батут YARTON 6FT зеленый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3061" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_i_jump_12ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a4d/a4d5f526f26aabca756658eee0e5d24c.jpg</picture>
<vendor>i-JUMP</vendor>
<vendorCode></vendorCode>
<name>Батут i-JUMP 12ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3062" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_8_ft_outside_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c66/c6625e36e25a02a1deb396175630a7c8.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 8 ft outside (Green)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3063" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_i_jump_8ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/78d/78d87d9d3c9d8a4a0b39172512092876.jpg</picture>
<vendor>i-JUMP</vendor>
<vendorCode></vendorCode>
<name>Батут i-JUMP 8ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="3064" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_classic_green_4_26_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/34c/34c811f6d179bbb9f00bbc2c9800ba1e.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Classic Green (4,26 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3065" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_6_ft_inside_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e67/e6768a312f176297ae8a7785150288e1.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 6 ft inside (green)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3066" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_air_game_basketball_4_6_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>51990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/47c/47c89d6f466cdf593b6063604953c387.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Air Game Basketball (4,6 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3067" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_14_ft_outside_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/246/246a5eec3e99ae45436ae4a0088b59bd.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 14 ft outside (blue)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие дитали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3068" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_kengoo_s_setkoy_10ft_tr_e_bas/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/cad/cadda194cbe3a20f2d2dabf1f40f1926.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE KENGOO С СЕТКОЙ 10FT-TR-E-BAS</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3069" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_bondy_sport_6ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>9390</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a21/a214f91771728a6c8b08d65c80c3b4a0.jpg</picture>
<vendor>BONDY SPORT</vendor>
<vendorCode></vendorCode>
<name>Батут BONDY SPORT 6FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3070" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_i_jump_6ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>11990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/823/8230eb87e7506baccfe211bd2146f34a.jpg</picture>
<vendor>i-JUMP</vendor>
<vendorCode></vendorCode>
<name>Батут i-JUMP 6ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3071" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_sky_13ft_3_96_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/95b/95b5e4a6bde6dfb4d9e29aa5fbf07cf4.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Sky 13ft (3,96 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3072" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_air_game_basketball_3_05_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>33790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e91/e914ecc8f9cbc8089d81fa782c1d56ff.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Air Game Basketball (3,05 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3073" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_10_ft_inside_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2f7/2f7659745ce5fef7c77ad0309be7d6ec.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 10 ft inside (green)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3074" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_14_ft_inside_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>28890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/842/84299a5e73407fc050cee3751b7c5721.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 14 ft inside (blue)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3075" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_bondy_sport_6ft_zelenyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>9390</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/71c/71c751a6fb2005ed3e4391f23732d1fa.jpg</picture>
<vendor>BONDY SPORT</vendor>
<vendorCode></vendorCode>
<name>Батут BONDY SPORT 6FT зеленый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3076" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_8_ft_inside_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/707/7074adfb1e02644a7a7732bba0558e0a.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 8 ft inside (green)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3077" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_10_ft_outside_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5a4/5a4582eeae5a08f9dd8099381e7f62d6.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 10 ft outside (Green)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие диталь и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3078" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_yarton_12ft_zelenyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/78f/78f194a6b67b0508b1c24de33a1a07b4.jpg</picture>
<vendor>YARTON</vendor>
<vendorCode></vendorCode>
<name>Батут YARTON 12FT зеленый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3079" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_diamond_fitness_4_5_ft_diametr_140_sm/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>6890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/767/767d76af1f844a30c1bf580de2acbffa.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой DIAMOND FITNESS 4,5 ft (диаметр 140 см) </name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3080" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_crox_7_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15960</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/dfa/dfa04af51e05104c9cad79e336ff5eee.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings CROX 7 ft</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3081" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_proxima_15_futov/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>23990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ed3/ed349a9a030262397b1e2410647a6473.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Батут Proxima 15 футов</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3082" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_diamond_fitness_external_8ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/812/8129ab5d798212a856ed7f0459b6a6b8.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Батут DIAMOND FITNESS External 8ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3083" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_classic_green_1_82_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12840</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/845/84595dfdc7c1f67bee05783b7c5e9cac.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Classic Green (1,82 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3084" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_yarton_8ft_zelenyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16390</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0e4/0e477e593a3c5eb31dd3c849f0cbdfdc.jpg</picture>
<vendor>YARTON</vendor>
<vendorCode></vendorCode>
<name>Батут YARTON 8FT зеленый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3085" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_12ft_3_66m_s_zashchitnoy_setkoy_i_lestnitsey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16380</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b19/b1921f85c88118683dcce14644d166a8.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 12FT 3,66м с защитной сеткой и лестницей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3086" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_bondy_sport_12ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/99d/99d3f81934862bf614034aec06175468.jpg</picture>
<vendor>BONDY SPORT</vendor>
<vendorCode></vendorCode>
<name>Батут BONDY SPORT 12FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3087" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_14_ft_4_26_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a78/a786ff8a2ee02a4d0804619fd1db175b.jpg</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings 14 ft (4,26 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3088" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_8_ft_outside_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/dea/dea3e1e0a0aa6b92b3111b7b0c09a111.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 8 ft outside (Blue)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3089" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_fitness_s_setkoy_12ft_tr_e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6ad/6adb28fe786dc2f755378e0d6b6c7001.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE FITNESS С СЕТКОЙ 12FT-TR-E</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3090" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_yarton_6ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12390</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1d1/1d1d463cab42c2ac79577d7fd3e4f7a4.jpg</picture>
<vendor>YARTON</vendor>
<vendorCode></vendorCode>
<name>Батут YARTON 6FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3091" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_fitness_s_setkoy_10ft_tr_e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/77f/77f765328e4a0145c1f63641f3260d98.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE FITNESS С СЕТКОЙ 10FT-TR-E</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3092" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_space_blue_14ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>22900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/df6/df69327e6e321177a69f3131941c9560.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Space Blue 14FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3093" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_sky_double_3_96_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34690</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/847/8470e06ffe1247aab43f910ce34d81aa.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Sky Double (3,96 м)</name>
<description></description>
<manufacturer_warranty>5 лет - на сквозную коррозийную устойчивость 1 год - на раму 6 месяцев - на детали износа</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3094" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_6_ft_outside_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7b3/7b3fad5420028a607dcdcd5cd7ffa1e0.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 6 ft outside (Blue)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3095" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_bondy_sport_8ft_zelenyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>11890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6de/6de2c493950086c8d905a6cae76a081f.jpg</picture>
<vendor>BONDY SPORT</vendor>
<vendorCode></vendorCode>
<name>Батут BONDY SPORT 8FT зеленый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3096" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_crox_4_5_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>10500</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e2a/e2ac14580659e386e4886574795f023f.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings CROX 4,5 ft</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3097" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_air_game_basketball_2_44_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fb6/fb6451bfb46645f7e2403be9ce74d92c.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Air Game Basketball (2,44 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3098" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_space/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>89990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/a4a/a4af0b1759628bc634527640a81e29c8.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Space</name>
<description></description>
<manufacturer_warranty>5 лет на сквозную коррозию</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3099" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_10_ft_supreme_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/171/171bee0a0c51af452b1a9b53de9d2aed.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 10 ft SUPREME (blue)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3100" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_15_ft_4_57_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>35990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fbb/fbb7af070a747de5126d77dcd209cff4.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings 15 ft (4,57 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3101" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_air_game_basketball_3_66_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9ec/9ec1f07b03ce10386cbf19f82f556639.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Air Game Basketball (3,66 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3102" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_12_ft_supreme_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d99/d995ddaaf295c7da6c6e7bc2968984dd.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 12 ft SUPREME (blue)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3103" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_classic_14_ft_blue_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>30890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4e0/4e08e89033a687dc36092e6831df8e2b.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Classic 14 FT (Blue / Green)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3104" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_fitness_s_setkoy_14ft_tr_e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f5f/f5f7ae12d8345deb899525aabed39715.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE FITNESS С СЕТКОЙ 14FT-TR-E</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3105" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_inspire_16ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>25900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/cbf/cbf0e6c232d9297fb5c080ab20b25236.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Inspire 16FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3106" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_12ft_3_66m_s_zashchitnoy_setkoy_vnutr_s_lestnitsey_gb10211_12ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16380</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8c7/8c70a864cc82bceeca23c86df7a3b9b5.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 12FT 3,66м с защитной сеткой (внутрь) с лестницей GB10211-12FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3107" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_classic_green_3_05_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21390</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ef6/ef6c11cfc3d99c6d78056b40e8ba498c.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Classic Green (3,05 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3108" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_diamond_fitness_black_edition_8ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b66/b66e37784b27b2e397b4648c56260f2b.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Батут DIAMOND FITNESS Black Edition 8ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3109" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_jumper_14ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>21900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/46d/46d96a6aed72db43a30c27e96e4dd949.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Jumper 14FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3110" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_proxima_14_futov/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e0b/e0b3b1be7dd738224a639cec1062ecbb.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Батут Proxima 14 футов</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3111" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_8ft_2_44m_s_zashchitnoy_setkoy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>9790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/272/2728a03c8a821366b7d127a80a63fe09.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 8FT 2,44м с защитной сеткой</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3112" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_classic_pink_2_44_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/4f1/4f116e648544d9412d6c6aed530757f6.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Classic Pink (2,44 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3113" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_space_blue_8ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/86f/86f34bce1651eb79b3d9e099aeefd29c.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Space Blue 8FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3114" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_classic_6_ft_blue_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12690</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/367/36795fb3edf7b231bc90eb1426e8dca7.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Classic 6 FT (Blue / Green)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3115" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_classic_8_ft_blue_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/19c/19cdc81800376aefca1731a4a557bedb.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Classic 8 FT (Blue / Green)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3116" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_classic_16_ft_blue_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>38890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/c30/c30c1e9501d6243557b9991e22dabdd2.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Classic 16 FT (Blue / Green)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3117" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_fitness_s_setkoy_6ft_tr_e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>9990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/206/2064420b01add4cb5dcd5dde76654da2.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE FITNESS С СЕТКОЙ 6FT-TR-E</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3118" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_space_blue_10ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/748/7480493775dbf7afac44e507a102dd81.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Space Blue 10FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3119" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_prime_12_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27690</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/26d/26d3e2f484b2589dcb22710dc0c7495a.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Prime 12 FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3120" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_sky_16ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e4e/e4e7d5692a8de8366e801f8f645c3926.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Sky 16ft</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3121" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_kengoo_s_setkoy_16ft_tr_e_bas/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/baa/baa92aa2d3fbebd10ffde698bafc0dae.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE KENGOO С СЕТКОЙ 16FT-TR-E-BAS</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3122" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_12ft_3_66m_s_zashchitnoy_setkoy_vnutr_b_l_gb10200_12ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15390</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f4b/f4b2a7e85f04a5b191063f7f265603e2.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 12FT 3,66м с защитной сеткой (внутрь) б/л GB10200-12FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3123" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_6ft_1_83m_s_zashchitnoy_setkoy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>7980</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/444/44471f273fe8c1ce598390c0b03b080d.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 6FT 1,83м с защитной сеткой</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3124" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_8ft_2_44m_s_zashchitnoy_setkoy_vnutr_b_l_gb10200_8ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>9380</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d60/d6057a5dc19dcee768a70dd9d25d94b7.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 8FT 2,44м с защитной сеткой (внутрь) б/л GB10200-8FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3125" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_sky_double_4_88_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>51990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7be/7be771e7d5b37b05402f839b11dfe9e5.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Sky Double (4, 88 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3126" available="true">
<url>http://sportzastava.ru/catalog/batuty/detskiy_batut_s_zashchitnoy_setkoy_fantasy_7ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/dd0/dd03ab39ef397956870df063fcb80c37.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Детский батут с защитной сеткой Fantasy 7FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3127" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_10ft_3_05m_s_zashchitnoy_setkoy_i_lestnitsey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12590</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/547/54776eb138a827feb3c4ce4571a9fbc1.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 10FT 3,05м с защитной сеткой и лестницей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="3128" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_space_blue_16ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ce6/ce68c53b7faf10ba0733f5bec9e3f02d.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Space Blue 16FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3129" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_6ft_1_83m_s_zashchitnoy_setkoy_vnutr_b_l_gb10201_6ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>9790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8f9/8f91374f21be092bb58a60902114127a.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 6FT 1,83м с защитной сеткой (внутрь) б/л GB10201-6FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3130" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_sky_10ft_3_04_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>25990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5ac/5ac2f6b394f6833ed45456ac656ced64.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Sky 10ft (3,04 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3131" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_sky_double_3_05_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27300</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8e2/8e25528c18402c123d0cd46b2ac537e2.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Sky Double (3,05 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3132" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_12ft_3_65_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8b1/8b1c5f96fde1c536cbfd4d71190548c3.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings 12ft (3,65 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3133" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_classic_12_ft_green_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/86e/86edda02618ce4495e048282ede13125.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Classic 12 FT (Green / Blue)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3134" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_classic_16_ft_green_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>38890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/66f/66f7e7723118c0e4e8f7f541702653c9.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Classic 16 FT (Green / Blue)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3135" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_10ft_3_05m_s_zashchitnoy_setkoy_vnutr_b_l_gb10200_10ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>11900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/86f/86f4c1c1e30dd70721e932c750ceca50.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 10FT 3,05м с защитной сеткой (внутрь) б/л GB10200-10FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3136" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_jumper_10ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/500/500f388c8d8fd93d395472d64740890d.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Jumper 10FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3137" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_12_ft_inside_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3bf/3bfeed5eda5e9f664ebb2039cf17577d.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 12 ft inside (blue)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3138" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_jumper_8ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/aa0/aa0c92b663710d1132be515c98ce4875.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Jumper 8FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3139" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_inspire_8ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>11900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5d2/5d294b29d5719f1940a2b90e9dcdffcd.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Inspire 8FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3140" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_classic_10_ft_green_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/483/4838a418467d579777601fb3ad41aebc.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Classic 10 FT (Green / Blue)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3141" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_classic_12_ft_blue_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>27490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/91f/91f25888076c907794c6b5132fa07a36.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Classic 12 FT (Blue / Green)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3142" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_jumper_12ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/09b/09b134d2949face9e89da57642d48123.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Jumper 12FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3143" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_space_green_8ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/37c/37ca93e6bf0b785169de0f113a1c2ebb.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Space Green 8FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3144" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_bondy_sport_10ft_zelenyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1f3/1f329ceda1899f30e39bd50e3296ffd0.jpg</picture>
<vendor>BONDY SPORT</vendor>
<vendorCode></vendorCode>
<name>Батут BONDY SPORT 10FT зеленый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3145" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_8_ft_2_43_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bb8/bb860f005241c144e58ce4c0a128c830.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings 8 ft (2,43 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3146" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_inspire_10ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9e7/9e735d2ad79b6c41d0c110fd6b1d17fd.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Inspire 10FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3147" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_classic_pink_3_05_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e5c/e5c0144e80e3d033329e5a5ad03322d8.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings Classic Pink (3,05 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3148" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_classic_8_ft_green_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>17290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/60e/60ed8868fd59d5573e0528f8ade126de.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Classic 8 FT (Green / Blue)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3149" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_14_ft_supreme_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5b0/5b0b02795bbb226ba51a1ea941217ba4.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 14 ft SUPREME (blue)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3150" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_classic_10_ft_blue_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/450/45015a8c10729cadffad871697dd051b.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Classic 10 FT (Blue / Green)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3151" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_prime_14_ft_green_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>37990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/102/102a10ad918a282c16082fa0f6616c2e.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Prime 14 FT (Green / Blue)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3152" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_12_ft_inside_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/845/845acc30701cc4b457e778ef3e6b4dd9.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 12 ft inside (green)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3153" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_8ft_2_44m_s_zashchitnoy_setkoy_vnutr_b_l_gb10201_8ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>9790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2d7/2d715628ed56cb5972962a7271454e11.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 8FT 2,44м с защитной сеткой (внутрь) б/л GB10201-8FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="3154" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_8ft_2_44m_s_zashchitnoy_setkoy_vnutr_i_kryshey_gb20202_8ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>18190</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/cfd/cfd7c69f8e88d31bc438dcc9bfcc226e.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 8FT 2,44м с защитной сеткой (внутрь) и крышей GB20202-8FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3155" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_prime_14_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>32090</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/847/847c1725eee82bf245aa7480e8d94103.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Prime 14 FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3156" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_classic_6_ft_green_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12690</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/731/7314ef4a14d9374b8ead61d3472464d4.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Classic 6 FT (Green / Blue)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3157" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_yarton_10ft_zelenyy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e43/e439967b198b13e5100a3e85312f4e6e.jpg</picture>
<vendor>YARTON</vendor>
<vendorCode></vendorCode>
<name>Батут YARTON 10FT зеленый</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3158" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_classic_14_ft_green_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>30890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/e13/e134a945f57bc93bb8a72676325712f0.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Classic 14 FT (Green / Blue)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3159" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_prime_14_ft_blue_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>37990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/976/976c25e5a4a0f3d9ec68354241455b0b.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Prime 14 FT (Blue / Green)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3160" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_bondy_sport_10ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fb5/fb56e19eefff51e569b7ba32ed4f9e64.jpg</picture>
<vendor>BONDY SPORT</vendor>
<vendorCode></vendorCode>
<name>Батут BONDY SPORT 10FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3161" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_16_ft_supreme_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>42490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/ac4/ac423fd8b00da152992e95308832fd43.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 16 ft SUPREME (blue)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3162" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_6_ft_outside_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/92a/92a42711ed219111450000a35a2d32fe.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 6 ft outside (Green)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3163" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_14ft_4_27m_s_zashchitnoy_setkoy_i_lestnitsey/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19880</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/177/1778375ce536730a427d3934636dc5c0.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 14FT 4,27м с защитной сеткой и лестницей</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3164" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_10ft_3_05m_s_zashchitnoy_setkoy_vnutr_i_kryshey_gb20202_10ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19590</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/56d/56df6c2a2faf7b962734cc99b046b2a5.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 10FT 3,05м с защитной сеткой (внутрь) и крышей GB20202-10FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3165" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_fitness_s_setkoy_20ft_tr_e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>45990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/b60/b60887055cacd1ba994c752861796699.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE FITNESS С СЕТКОЙ 20FT-TR-E</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3166" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_10ft_3_05m_s_zashchitnoy_setkoy_vnutr_s_lestnitsey_gb10211_10ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12590</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/620/620573d98a523f58809f925a4e05f26b.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 10FT 3,05м с защитной сеткой (внутрь) с лестницей GB10211-10FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3167" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_prime_10_ft_blue_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26090</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/65f/65f554e9f7c6cc3671e305435405cf9f.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Prime 10 FT (Blue / Green)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3168" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_inspire_14ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bba/bbad53305261114cdc606630c86b83d1.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Inspire 14FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3169" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_prime_8_ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1d6/1d68ca2b28043099194c4823a1e14533.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Prime 8 FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3170" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_jumper_16ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fb5/fb5efe07e335c1a59bfbc26ca81b2dc5.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Jumper 16FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3171" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_inspire_12ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/419/419fbe3fa446d29af17c21a606b95c71.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Inspire 12FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3172" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_14_ft_supreme_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/668/668c660821a91bce4593ea6b0dbfd534.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 14 ft SUPREME (green)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3173" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_fitness_s_setkoy_16_ft_tr_e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3d6/3d6f8b4fccbe3fc557421533d2985c29.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE FITNESS С СЕТКОЙ 16-FT-TR-E</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3174" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_diamond_fitness_internal_8ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/8d6/8d65b80c701aca12e3e7652bfef530f9.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Батут DIAMOND FITNESS Internal 8ft</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3175" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_diamond_fitness_internal_10ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/88f/88fe3e190cb6cd54e5b4b1c49e0af152.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Батут DIAMOND FITNESS Internal 10ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3176" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_10_ft_supreme_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f88/f8813e605c6ed0e16be2ff74d3d1b59c.png</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 10 ft SUPREME (green)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3177" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_fitness_s_setkoy_17ft_tr_e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>34990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/638/63890719f33e2598f04b4a976fe42a26.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE FITNESS С СЕТКОЙ 17FT-TR-E</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3178" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_kengoo_s_setkoy_17ft_tr_e_bas/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>37990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/102/10211f04f55a68f5cccc63741c3c27d8.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE KENGOO С СЕТКОЙ 17FT-TR-E-BAS</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3179" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_12_ft_outside_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/59a/59a84a0988dc5da00bc9cd4d4be1d732.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 12 ft outside (Blue)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3180" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_kengoo_s_setkoy_12ft_tr_e_bas/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>22990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/fde/fdea64f99f36229a4eed813e3009a344.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE KENGOO С СЕТКОЙ 12FT-TR-E-BAS</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3181" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_fitness_s_setkoy_18ft_tr_e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>39990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3e6/3e6b0127c9eef7c5f24d2e58efe2af64.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE FITNESS С СЕТКОЙ 18FT-TR-E</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3182" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_kengoo_s_setkoy_20ft_tr_e_bas/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>49990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/5de/5de989df10c3b764a5c354fd273bd714.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE KENGOO С СЕТКОЙ 20FT-TR-E-BAS</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3183" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_6_ft_1_82_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>11990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d6b/d6b13ba676658ef79d73b253aa3386b3.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings 6 ft (1,82 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3184" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_yarton_10ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/352/3522b6e9e079a2d4f80ed6845eada507.jpg</picture>
<vendor>YARTON</vendor>
<vendorCode></vendorCode>
<name>Батут YARTON 10FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3185" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_diamond_fitness_internal_12ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d7e/d7edb11de3a27a36a9e2411564d0c8c3.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Батут DIAMOND FITNESS Internal 12ft</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3186" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_diamond_fitness_internal_16ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/248/248abaee5e24aec622993d0280d9676e.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Батут DIAMOND FITNESS Internal 16ft</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3187" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_proxima_8_futov/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>9990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/dcb/dcbfb1c044245fd9e028b6eb783dbb59.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Батут Proxima 8 футов</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3188" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_proxima_10_futov/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>13490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f15/f15ce819e10abbd2b4cdc671b45e56f1.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Батут Proxima 10 футов</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3189" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_12_ft_outside_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>24890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/be0/be0f2b984b0b8515a49917d5bef56ce8.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 12 ft outside (Green)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3190" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_prime_10_ft_green_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>26090</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/241/241a226b775b713922b8f37fa254f416.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Prime 10 FT (Green / Blue)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3191" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_10_ft_inside_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/978/9789d4b6b040d6fa13df18dbc1cb718e.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 10 ft inside (blue)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3192" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_kengoo_s_setkoy_18ft_tr_e_bas/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>43990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/119/1191502376be03452a22821fabecd7af.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE KENGOO С СЕТКОЙ 18FT-TR-E-BAS</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3193" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_16_ft_supreme_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>42490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9f8/9f8daa80f0185f921631cd7ce420ee7e.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 16 ft SUPREME (green)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3194" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_12_ft_supreme_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>29890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/cd9/cd9d47b598a53bca12d213353d185955.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 12 ft SUPREME (green)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3195" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_dfc_trampoline_fitness_s_setkoy_8ft_tr_e/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/98e/98efeef431020b64b811bd3bd4212ae8.jpg</picture>
<vendor>DFC</vendor>
<vendorCode></vendorCode>
<name>Батут DFC TRAMPOLINE FITNESS С СЕТКОЙ 8FT-TR-E</name>
<description></description>
<manufacturer_warranty>12 месяцев</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3196" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_proxima_12_futov/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>15990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/3c7/3c7c797cc735af0045c7cd7793d55169.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Батут Proxima 12 футов</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3197" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_diamond_fitness_4_5ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>6890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/bd8/bd8ad7d75ce866b87b9287cde78ad741.jpg</picture>
<vendor>DIAMOND FITNESS</vendor>
<vendorCode></vendorCode>
<name>Батут DIAMOND FITNESS 4,5ft</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3198" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_6ft_1_83m_s_zashchitnoy_setkoy_vnutr_i_kryshey_gb20202_6ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>16790</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f8b/f8b0fd98f4b77bfd5af7c3ca4869b8c3.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 6FT 1,83м с защитной сеткой (внутрь) и крышей GB20202-6FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3199" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_proxima_6_futov/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>7990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/900/900efe7b594c8495290f3e70950d2af0.jpg</picture>
<vendor>Proxima</vendor>
<vendorCode></vendorCode>
<name>Батут Proxima 6 футов</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3200" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_baby_grad_optima_10ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>14290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/98f/98f52aadd22191583b4c25f8e82493f5.jpg</picture>
<vendor>Baby Grad</vendor>
<vendorCode></vendorCode>
<name>Батут Baby-Grad Оптима 10ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3201" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_baby_grad_kosmo_12ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/878/878e4fdd2f6f20b03e09f6838e3e7273.jpg</picture>
<vendor>Baby Grad</vendor>
<vendorCode></vendorCode>
<name>Батут Baby-Grad Космо 12ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3202" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_10_ft_outside_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/65e/65ee23bf062820ea6c4d302431f814af.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 10 ft outside (Blue)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3203" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_baby_grad_kosmo_10ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>19590</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/895/89597704ec1b14b9453ba70284f55562.jpg</picture>
<vendor>Baby Grad</vendor>
<vendorCode></vendorCode>
<name>Батут Baby-Grad Космо 10ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3204" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_baby_grad_kosmo_8ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12390</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/0da/0daeefa525865433481ed322ede9b260.jpg</picture>
<vendor>Baby Grad</vendor>
<vendorCode></vendorCode>
<name>Батут Baby-Grad Космо 8ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3205" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_baby_grad_optima_8ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>9390</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/36c/36c88bda7f6b069ecf7d80167e2ed38d.jpg</picture>
<vendor>Baby Grad</vendor>
<vendorCode></vendorCode>
<name>Батут Baby-Grad Оптима 8ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="3206" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_baby_grad_optima_6ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>8990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/968/9689ae1a3eed19fd095560502cc67720.jpg</picture>
<vendor>Baby Grad</vendor>
<vendorCode></vendorCode>
<name>Батут Baby-Grad Оптима 6ft</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin></country_of_origin>
</offer>
<offer id="3207" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_bondy_sport_8ft_siniy/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>11890</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/7bd/7bda4f1b3efccd75d1724dadfcee7636.jpg</picture>
<vendor>BONDY SPORT</vendor>
<vendorCode></vendorCode>
<name>Батут BONDY SPORT 8FT синий</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3208" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_6ft_1_83m_s_zashchitnoy_setkoy_vnutr_b_l_gb10200_6ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>7980</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/d23/d233f899144376a880972296eddde99b.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 6FT 1,83м с защитной сеткой (внутрь) б/л GB10200-6FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3209" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_hasttings_10_ft_3_04_m/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>20990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/2e2/2e2de54f6b03fae55e889d90c225c3d6.png</picture>
<vendor>Hasttings</vendor>
<vendorCode></vendorCode>
<name>Батут Hasttings 10 ft (3,04 м)</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3210" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_prime_12_ft_blue_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f3d/f3d07a0dc464a89cb95db8e7df0587b5.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Prime 12 FT (Blue / Green)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3211" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_prime_16_ft_blue_green/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>47290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9dc/9dc87d16db5465012fcf144ed1450421.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Prime 16 FT (Blue / Green)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3212" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_prime_12_ft_green_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>31990</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/f51/f51bc90ed7c1446bcb8627b7d2086c09.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Prime 12 FT (Green / Blue)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3213" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_swollen_prime_16_ft_green_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>47290</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/1fe/1febeae08a07602a2e88a612aac08e19.jpg</picture>
<vendor>SWOLLEN</vendor>
<vendorCode></vendorCode>
<name>Батут Swollen Prime 16 FT (Green / Blue)</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3214" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_sport_elit_10ft_3_05m_s_zashchitnoy_setkoy_vnutr_b_l_gb10201_10ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>10860</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/429/4293269f49903014864b9f09485ecf3f.jpg</picture>
<vendor>SPORT ELIT</vendor>
<vendorCode></vendorCode>
<name>Батут SPORT ELIT 10FT 3,05м с защитной сеткой (внутрь) б/л GB10201-10FT</name>
<description></description>
<manufacturer_warranty></manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3215" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_unix_line_6_ft_inside_blue/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>12490</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/6ec/6ec3be752faaacec31234225f8453354.jpg</picture>
<vendor>Unix</vendor>
<vendorCode></vendorCode>
<name>Батут UNIX line 6 ft inside (blue)</name>
<description></description>
<manufacturer_warranty>2 года на раму, 1 год на мягкие детали и пружины</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
<offer id="3216" available="true">
<url>http://sportzastava.ru/catalog/batuty/batut_s_zashchitnoy_setkoy_inspire_6ft/?r1=<?=$strReferer1; ?>&amp;r2=<?=$strReferer2; ?></url>
<price>8900</price>
<currencyId>RUB</currencyId>
<categoryId>158</categoryId>
<picture>http://sportzastava.ru/upload/iblock/9b3/9b33e30a667809d05ffda75b7d41d517.jpg</picture>
<vendor>Eclipse</vendor>
<vendorCode></vendorCode>
<name>Батут с защитной сеткой Inspire 6FT</name>
<description></description>
<manufacturer_warranty>1 год</manufacturer_warranty>
<country_of_origin>Китай</country_of_origin>
</offer>
</offers>
</shop>
</yml_catalog>
