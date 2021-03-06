<?php
  include "./bInit.php";
  $user_id = Session::get("userid");
  //echo "<script>alert(11111);</script>";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>楼口12349</title>
    <!--meta标签-->
    <!--测试阶段-->
   <!--  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" /> -->
    <!--测试阶段-->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, minimal-ui" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />
    <meta name="format-detection" content="telephone=no, email=no" />
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="screen-orientation" content="portrait" />
    <meta name="x5-orientation" content="portrait" />
    <meta name="full-screen" content="yes" />
    <meta name="x5-fullscreen" content="true" />
    <meta name="browsermode" content="application" />
    <meta name="x5-page-mode" content="app" />
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="author" content="glivia | 286864566" />
    <meta name="application-name" content="楼口12349" />
    <meta name="keywords" content="楼口12349" />
    <meta name="description" content="楼口12349" />
    <link type="text/css" rel="stylesheet" href="./assets/css/base.css" />
    <link type="text/css" rel="stylesheet" href="./assets/css/mobiscroll.custom-2.5.0.min.css" />
    <link type="text/css" rel="stylesheet" href="./assets/css/mobilebone.animate.css" />
    <link type="text/css" rel="stylesheet" href="./assets/css/mobilebone.css" />
</head>
<body data-userid="<?php echo $user_id ?>">
<div id="mobileBind" class="page out OutPage mobileBind">
        <div class="headerInner">
            <a class="icon_left" href='javascript:void(0)' data-rel="back">
            <img class="back" src="./assets/images/icon_back.png" width="20" />
            <span>返回</span>
        </a>
            <div class="title">绑定手机</div>
        </div>
    <div id="c15" class="ic1 C">
        <div class="ic2">
            <section id="page-login"  class="page-login ">
                    <div class="input-group C">
                        <input type="tel" class="login-tel input l" value="<?php echo Session::get("tel") ?>"  placeholder="手机号码" />
                        <a href="javascript:void(0)" class="login-send-num bg-y cr-w btn r">发送验证码</a>
                    </div>

                    <input type="tel" class="input login-num" placeholder="验证码" />

                    <p class="notice-login notice"><i class="icon icon-ok-sign"></i>同意并遵守 <a href='#regLaw'>《楼口12349用户注册协议》</a><p>
                    
                    <a href="javascript:void(0)" class="btn-login btn-bind">确定</a>
            </section>
        </div>
    </div>
</div>


<!--用户注册协议-->

<div id="regLaw" class="page  out OutPage regLaw">
        <div class="headerInner">
            <a class="icon_left" href='javascript:void(0)' data-rel="back">
                <img class="back" src="./assets/images/icon_back.png" width="20" />
                <span>返回</span>
            </a>
            <div class="title">用户注册协议</div>
        </div>
    <div class="ic1 C" id="c16">
             <div class="law-content C ic2">
                        <p>
  一、会员注册协议的确认和接纳<br />
  本服务协议双方为常州买东西网络科技有限公司（下称&quot;楼口&quot;）与楼口网站用户，本服务协议具有合同效力。本服务协议内容包括协议正文及所有楼口已经发布的或将来可能发布的各类规则。所有规则为协议不可分割的一部分，与协议正文具有同等法律效力。<strong><u>请您仔细阅读本协议的内容及网站发布的各类规则，对于协议中以粗体下划线标注出来的部分应重点阅读。</u></strong><br />
  <strong>用户确认本服务协议后，本服务协议即在用户和楼口之间产生法律效力。请用户务必在注册之前认真阅读全部服务协议内容，如有任何疑问，可向楼口咨询。用户同意并完成注册程序时，即表示其签署了本服务协议。用户确认：本协议条款是处理双方权利义务的当然约定依据，除非违反国家强制性法律，否则始终有效。在下订单的同时，用户也同时承认了用户拥有购买这些商品的权利能力和行为能力，并且对用户在订单中提供的所有信息的真实性负责。 </strong><br />
  <strong>楼口有权根据需要不时地制定、修改本协议或各项规则，如本协议有任何变更，楼口将提前在网站上刊载公告予以通知。如用户不同意相关变更，请您立即停止使用楼口所提供的服务。经修订的协议在楼口网站自公布之日起七天后生效。登录或继续使用楼口所提供的服务将表示用户接受经修订的协议。 </strong></p>
<p>二、服务简介<br />
  1、楼口通过楼口APP为您提供网络交易平台服务，用户可在楼口APP上查询、浏览由入驻商家（以下统称&quot;商家&quot;）发布的商品或服务（以下统称&quot;商品&quot;）信息，购买商品，发表评价，参加楼口网站的有关活动以及使用其他服务。<br />
  2、楼口运用自己的操作系统通过国际互联网络为用户提供网络服务。同时，用户必须： <br />
  (1)自行配备上网的所需设备，包括手机或其它必备上网装置。 <br />
  (2)自行负担个人上网所支付的与此服务有关的电话费用、网络费用。</p>
<p>三、会员管理<br />
  1、楼口仅向具备完全民事权利能力和民事行为能力的自然人或依法成立、存续的实体组织提供服务。如果用户不满足前述条件，希望用户不要向我们提供任何信息。若发现用户不具备该条件，楼口可采取取消订单、冻结或关闭账户、拒绝提供服务等措施，给楼口及相关方造成损失的，用户还应承担赔偿责任。<br />
  2、您在申请成为楼口会员时，应向楼口提供真实、准确、完整、合法有效的注册资料，并且当您的注册资料发生变动时，应及时进行更新。<strong>如果您提供的注册资料不合法、不真实、不准确、不详尽，您须承担因此引起的相应责任及后果，并且楼口有权注销您的会员账户，终止您使用会员服务的权利。</strong><br />
  3、注册成功成为楼口网站的合法用户后，您将得到一个账户。用户应妥善保管该账户的用户名和密码，并对在其账户项下发生的行为负责。用户不得以任何形式转让或授权他人使用自己的账户。用户可随时更改自己的密码以保障账户安全。为了保障账户及资金安全，楼口建议用户启动全部安全设置。用户若发现任何非法使用用户帐号或存在安全漏洞的情况，请立即通知楼口。<br />
  4、涉及您的姓名、地址、电子邮箱、联系电话等个人信息的，楼口将予以严格保密，除非：<br />
  (1)事先获得您的明确授权；<br />
  (2)系为履行您的订单或保护您的合法权利所必须；<br />
  (3)相应的法律程序及相关政府部门要求楼口提供的。<br />
  5、用户单独承担发布内容的责任。用户对服务的使用是根据所有适用于楼口的国家法律、地方法律和国际法律标准的。用户必须遵循：<br />
  (1)从中国境内向外传输技术性资料时必须符合中国有关法规。 <br />
  (2)使用网络服务不作非法用途。 <br />
  (3)不干扰或混乱网络服务。 <br />
  (4)遵守所有使用网络服务的网络协议、规定、程序和惯例。用户须承诺不传输任何非法、骚扰性、中伤他人、辱骂性、恐吓性、伤害性、庸俗、淫秽等信息资料。另外，用户也不能传输教唆他人构成犯罪行为的资料；不能传输助长国内不利条件和涉及国家安全的资料；不能传输任何不符合当地法规、国家法律和国际法律的资料。未经许可而非法进入其它电脑系统是禁止的。若用户的行为不符合以上提到的服务条款，楼口将作出独立判断立即取消用户服务帐号。用户需对自己在网上的行为承担法律责任。用户若在楼口网站上散布和传播反动、色情或其它违反国家法律的信息，楼口网站的系统记录有可能作为用户违反法律的证据。<br />
  楼口有判定用户的行为是否符合楼口服务条款的要求和精神的保留权利，如果用户违背了服务条款的规定，楼口有中断对其提供网络服务的权利。</p>
<p>四、商品信息<br />
  <strong>1</strong><strong>、楼口网站上的商品信息随时有可能发生变动，楼口对此不作特别通知。楼口将尽最大化的合理努力，使网站展示的商品参数、说明、价格、库存等商品信息尽可能准确、详细，但由于网站上商品信息的数量极其庞大，且受互联网技术发展水平等因素的限制，网页显示的信息可能会有一定的滞后性或差错，对此情形请您充分知悉并予以理解。如您发现商品信息错误或有疑问的，请您在第一时间告诉楼口或商家，并不要提交订单。同时，为了使更多的消费者能够正常参与楼口的优惠活动，营造一个公平公正透明的网络购物环境，楼口会对低价促销商品购买的数量有所限制。 </strong><br />
  2、商品的价格都包含了法律规定的税金。配送费用将根据楼口网站上公布的楼口自营和商家配送收费标准另行计收。如果发生了意外情况，在确认了用户的订单后，由于供应商提价、税额变化引起的价格变化，或是由于网站的错误等造成商品价格变化，用户有权取消订单，并希望用户能及时电话通知楼口客服部。</p>
<p>五、订单<br />
  1、当您提交订单时，请您仔细确认所购商品的名称、价格、数量、型号、规格、尺寸、联系地址、电话、收货人等信息。收货人与您本人不一致的，收货人的行为和意思表示视为您的行为和意思表示，您应对收货人的行为及意思表示的法律后果承担连带责任。<br />
  <strong>如果因为您填写的收货人联系电话、地址等信息错误，导致商家（或商家委托的配送公司）将货物交付给非您本意的收货人的，由此造成的损失由您自行承担。 </strong><br />
  2、除法律另有强制性规定外，双方约定如下：网站上商家展示的商品和价格等信息仅仅是要约邀请，您下单时须填写您希望购买的商品数量、价款及支付方式、收货人、联系方式、收货地址（合同履行地点）、合同履行方式等内容；系统生成的订单信息是计算机信息系统根据您填写的内容自动生成的数据，仅是您向商家发出的合同要约；商家收到您的订单信息后，只有在商家将您在订单中订购的商品从仓库实际直接向您发出时（  以商品出库为标志），方视为您与商家之间就实际直接向您发出的商品建立了合同关系；如果您在一份订单里订购了多种商品并且商家只给您发出了部分商品时，您与商家之间仅就实际直接向您发出的商品建立了合同关系；只有在商家实际直接向您发出了订单中订购的其他商品时，您和商家之间就订单中该其他已实际直接向您发出的商品才成立合同关系。您可以随时登陆您在本站注册的账户，查询您的订单状态。<br />
  3、由于市场变化及各种以合理商业努力难以控制的因素的影响，商家无法保证您提交的订单信息中希望购买的商品都会有货。如用户购买的商品发生缺货的情形，用户有权取消该订单。 <br />
  <strong>4</strong><strong>、商家仅向消费者提供商品销售服务，若您并非因生活消费购买商品，而是中间商、零售商或批发商，则商家有权单方取消订单。 </strong></p>
<p>六、  配送<br />
  楼口会尽量按照用户选择的送货时间段及时把商品送到用户所指定的送货地址。所有在楼口网站上列出的送货时间为参考时间，仅供用户参考使用。参考时间的计算是根据库存状况、正常的处理过程和送货时间、送货地点估计得出的。<br />
  请清楚准确地填写用户的真实姓名、送货地址及联系方式。因如下情况造成订单延迟或无法配送等，楼口将不承担责任：<br />
  (1)因收货人填写的收货信息错误或不明确造成订单无法送达；<br />
  (2)货物送达无人签收，由此造成的重复配送所产生的费用及相关的后果。<br />
  (3)不可抗力，例如：自然灾害、交通戒严、突发战争等。</p>
<p>七、售后服务<br />
  1、楼口网站按照国家法律法规规定，制定、发布商品退换货规则，以规范商家和用户之间的商品交易行为。用户在楼口网站提交订单即表明其接受楼口网站的退换货规则。<strong><u> </u></strong><br />
  2、如用户在购物过程中有任何疑问或与商家产生纠纷的，可以向楼口网站客服部（400-678-0519）进行咨询和投诉。<br />
  3、用户通过网络交易平台购买商品或者接受服务，其合法权益受到损害的，可以向销售者或者服务者要求赔偿。也可以请求楼口出面协调，楼口将尽力为用户解决纠纷，若楼口无法提供销售者或者服务者的真实名称、地址和有效联系方式的，用户也可以向楼口要求赔偿；楼口赔偿后，有权向销售者或者服务者追偿。</p>
<p>八、条款的更新与变动<br />
  用户协议条款的修改、服务变更或其它重要事件会以在楼口网站公告的形式进行。变更后的用户协议及规则会提前七天在楼口网站予以公示。</p>
<p>九、知识产权<br />
  1、楼口网站所刊登的资料信息(诸如文字、图表、标识、按钮图标、图像、声音文件片段、数字下载、数据编辑和软件)，均是楼口或其内容提供者的财产，受中国和国际版权法律的保护。任何被授权的浏览、复制、打印和传播属于楼口网站内信息内容都不得用于商业目的且所有信息内容及其任何部分的使用都必须包括此版权声明。<br />
  2、楼口平台所有的产品、技术与所有程序均属于楼口知识产权。&quot;楼口&quot;、以及楼口其他产品服务名称及相关图形、标识等为楼口的注册商标。未经楼口许可，任何人不得擅自（包括但不限于：以非法的方式复制、传播、展示、镜像、上载、下载）使用。否则，楼口将依法追究其法律责任。 <br />
  3、用户在楼口网站上发表的文章及图片（包括转贴的文章及图片）版权仅归属原作者所有，若作者有版权声明或原作从其他网站转载而附带有原版权声明者，其版权归属以附带声明为准。<br />
  十、  信息保护<br />
  1、用户个人隐私：请阅读楼口网站的隐私权政策进行了解。该声明适用于您访问楼口网站，或在楼口网站购买商品或使用楼口网站提供的任何服务。<br />
  2、信息安全<br />
  （1）楼口网站账户有密码保护，请用户妥善保管账户及密码信息；<br />
  （2）如果用户发现自己的个人信息泄密，尤其是楼口网站账户及密码发生泄露，请用户立即联络楼口网站客服，以便楼口网站采取相应措施。<br />
  3、Cookie的使用规则<br />
  （1）通过楼口网站所设Cookie所取得的有关信息，将适用本规则；<br />
  （2）在楼口网站上发布信息的第三方通过其所发布信息在用户计算机上设定Cookies的，将按该第三方的隐私权政策使用；<br />
  （3）编辑和删除个人信息的权限：用户可以点击&quot;会员中心&quot;对用户的个人信息进行编辑和删除，除非楼口网站另有规定。</p>
<p>十一、责任限制<br />
  1、如因不可抗力或其它楼口无法控制的原因使楼口网站系统崩溃或无法正常使用导致网上交易无法完成或丢失有关的信息、记录等，楼口不承担责任。但是楼口会尽可能合理地协助处理善后事宜，并努力使客户免受经济损失。<br />
  2、除了楼口的使用条件中规定的其它限制和除外情况之外，在中国法律法规所允许的限度内，对于因使用楼口网站服务而引起的任何损害或经济损失，楼口承担的全部责任，不论是合同、保证、侵权(包括过失)项下的还是其它的责任，均不超过就用户所购买的与该索赔有关的商品所实际获得的直接收益。这些责任限制条款将在法律所允许的最大限度内适用，并在用户账户被注销后仍继续有效。</p>
<p>十二、结束服务<br />
  1、楼口可根据战略规划或市场行情中断一项或多项服务，除法律另有规定外，楼口无义务对任何个人或第三方负责。用户如对本协议任何条款或对将来的条款修改有异议，或对楼口的服务不满，可以行使如下权利：<br />
  （1）不再使用楼口网站的服务；<br />
  （2）通知楼口停止对您提供服务。会员服务终止后，您使用楼口网站服务的权利马上终止。从那时起，楼口没有义务传送或提供您使用会员服务所形成的信息资料给您或第三方。<br />
  2、出现以下情况时，楼口有权直接以注销会员账户的方式终止本章程，并有权永久冻结或注销您的账户在楼口网站权限，并收回会员账户对应的会员昵称：<br />
  （1）楼口认为您通过该会员账户购物后从事转售业务的（从事批发、零售等）；<br />
  （2）您通过会员账户，或通过注册多个会员账户（两个及以上）购物，并违反促销活动时关于购物数量的限制的；<br />
  （3）您提供的手机或电子邮箱等联系方式无法接收信息或实际不存在，且没有其他方式可以与您进行联系的；<br />
  （4）您提供的用户信息中的内容不真实或不准确或不完整的；<br />
  （5）本协议及相关规则变更时，您明示并通知楼口不愿接受该变更的。<br />
  （6）因其他原因，楼口决定终止为您提供会员服务的。<br />
  3、因您违反本协议的规定而导致楼口、商家或其他第三方损失的，您同意予以全额赔偿，该等损失包括但不限于律师费、诉讼费、直接损失、间接损失等。</p>
<p>十三、法律管辖和适用<br />
  本协议的订立、执行和解释及争议的解决均应适用中国法律。本协议的规定是可分割的，如发生楼口服务条款与中国法律相抵触时，则这些条款将完全按法律规定重新解释，而其它合法条款则依旧保持对用户产生法律效力和影响。如本协议任何规定被裁定为无效或不可执行，该规定可被删除而其余条款应予以执行。如双方就本协议内容或其执行发生任何争议，双方应尽力友好协商解决；协商不成时，任何一方均可向楼口所在地常州市新北区人民法院提起诉讼。</p>
                    </div>
    </div>
</div>


<!--
################################################
js
################################################
-->

    <script type="text/javascript" src="./assets/js/lib/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="./assets/js/lib/mobilebone.js"></script>
    <script type="text/javascript" src="./assets/js/lib/iscroll.js"></script>
    <script type="text/javascript" src="./assets/js/lib/dialog.js"></script>
    <script type="text/javascript" src="./assets/js/lib/fastclick.min.js"></script>
    <script type="text/javascript" src="./assets/js/module/init.js"></script>
    <script type="text/javascript">
    $(function(){
 
        var DJS = 60
        ,   DJS_TIME = null;
          
        $(document).on("click",".login-send-num",function(){
            if( DJS == 60 ){
              var tel = $(".login-tel").val();
              if( $.trim( tel ).length == 11  && (/^[0-9]*$/.test($.trim(tel)))){

                $.ajax({
                  url  : 'MW.php',
                  type : 'post',
                  dataType : 'json',
                  data : {
                    "app"  : 'Sms',
                    "act"  : 'sendMsg',
                    "phone_mob"  : tel,
                    "type" : 2,
                    "message" : 1
                  },
                  success :function(data){

                    if( data['success'] == true){
                        DJS_TIME = setInterval(function(){
                            DJS--;
                            if( !DJS ){
                              clearInterval(DJS_TIME);
                              DJS = 60;
                              $(".login-send-num").text("发送验证码");
                            }else{
                              $(".login-send-num").text(DJS+"秒后重发");
                            }

                        },1000);
                    }else{
                      alert(data['msg']);
                    }

                  

                  },
                  error : function(){
                    alert("验证码发送失败,请重新发送.");
                  }
                })

              }else{
                alert("请输入合法电话号码!");
              }
          }
        })
        

        //提交
        $(document).on("click",".btn-bind",function(){
            var cnt = $(".login-num").val();
            var tel = $(".login-tel").val();
            if( $.trim(tel).length != 11 || !(/^[0-9]*$/.test($.trim(tel))) ){
                alert("请输入合法电话号码!");
                return 0 ;
            } 

            // $.ajax({
            //   url : 'MW.php',
            //   type : 'post',
            //   dataType : 'json',
            //   data : {
            //      needYZM   : 1,
            //      phone_mob : tel,
            //      yzm       : cnt
            //   },
            //   success : function(data){

            //     if( data['success'] == true ){
                  
            //     }else{
            //       alert(data['msg']);
            //     }

            //   },  
            //   error : funtion(err){
            //       alert("请重新绑定!");
            //   }
            // })


            // if( $.trim( cnt ).length == 5 && $.trim(cnt) == <?php echo Session::get("YZMCODE") ?> && $.trim( $(".login-tel").val() == <?php echo Session::get("tel") ?> )){
 
                $.ajax({
                  url  : 'MW.php',
                  type : 'post',
                  dataType : 'json',
                  data : {
                    app       : "My",
                    act       : "bind",
                    needYZM   : 1,
                    phone_mob : tel,
                    yzm       : cnt,
                    user_id   : $("body").attr("data-userid")
                  },
                  success : function(data){
                   // alert(JSON.stringify(data));
                    if( data['success'] == true ){
                      mh_dialogShow("mh_success","恭喜您,手机绑定成功!",2,true,'home.php');
                    }else{
                      alert( data['msg'] ); 
                    }
                  },
                  error : function(error){
                     alert("请重新绑定!");
                  }
                })

            // }else{
            //     alert("验证码错误!");
            // }  
        })

    })
    </script>
    <?php require_once "./shareConf.php" ?>
</body>
</html>
