<div class="modal fade modal-share" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered max-width-800">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title mt-0">
                    Zdieľať <span class="share-name"></span>
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <div class="row" style="padding-left: 55px">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ Request::url() }}" style="width: 60px; height: 60px; margin-left: 20px">
                                    <svg viewBox="0 0 60 60" preserveAspectRatio="xMidYMid meet" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;" class="style-scope yt-icon"><g class="style-scope yt-icon"><g fill="none" fill-rule="evenodd" class="style-scope yt-icon"><path d="M28.4863253 59.9692983c-6.6364044-.569063-11.5630204-2.3269561-16.3219736-5.8239327C4.44376366 48.4721168 3e-7 39.6467924 3e-7 29.9869344c0-14.8753747 10.506778-27.18854591 25.2744118-29.61975392 6.0281072-.9924119 12.7038532.04926445 18.2879399 2.85362966C57.1386273 10.0389054 63.3436516 25.7618627 58.2050229 40.3239688 54.677067 50.3216743 45.4153135 57.9417536 34.81395 59.5689067c-2.0856252.3201125-5.0651487.5086456-6.3276247.4003916z" fill="#3B5998" fill-rule="nonzero" class="style-scope yt-icon"></path><path d="M25.7305108 45h5.4583577V30.0073333h4.0947673l.8098295-4.6846666h-4.9045968V21.928c0-1.0943333.7076019-2.2433333 1.7188899-2.2433333h2.7874519V15h-3.4161354v.021c-5.3451414.194-6.4433395 3.2896667-6.5385744 6.5413333h-.0099897v3.7603334H23v4.6846666h2.7305108V45z" fill="#FFF" class="style-scope yt-icon"></path></g></g></svg>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ Request::url() }}" style="width: 60px; height: 60px; margin-left: 10px">
                                    <svg viewBox="0 0 60 60" preserveAspectRatio="xMidYMid meet" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;" class="style-scope yt-icon"><g class="style-scope yt-icon"><g fill="none" fill-rule="evenodd" class="style-scope yt-icon"><path d="M28.486325 59.969298c-6.636404-.569063-11.56302-2.326956-16.321973-5.823932C4.443764 48.472116 0 39.646792 0 29.986934 0 15.11156 10.506778 2.798388 25.274412.36718c6.028107-.992411 12.703853.049265 18.28794 2.85363 13.576275 6.818095 19.7813 22.541053 14.64267 37.103159-3.527955 9.997705-12.789708 17.617785-23.391072 19.244938-2.085625.320112-5.065149.508645-6.327625.400391z" fill="#1DA1F2" fill-rule="nonzero" class="style-scope yt-icon"></path><path d="M45.089067 17.577067c-.929778.595555-3.064534 1.460977-4.117334 1.460977v.001778C39.7696 17.784 38.077156 17 36.200178 17c-3.645511 0-6.6016 2.956089-6.6016 6.600178 0 .50631.058666 1.000178.16711 1.473778h-.001066c-4.945066-.129778-10.353422-2.608356-13.609244-6.85049-2.001778 3.46489-.269511 7.3184 2.002133 8.72249-.7776.058666-2.209067-.0896-2.882844-.747023-.045156 2.299734 1.060622 5.346845 5.092622 6.452267-.776533.417778-2.151111.297956-2.7488.209067.209778 1.941333 2.928355 4.479289 5.901155 4.479289C22.46009 38.565156 18.4736 40.788089 14 40.080889 17.038222 41.929422 20.5792 43 24.327111 43c10.650667 0 18.921956-8.631822 18.4768-19.280356-.001778-.011733-.001778-.023466-.002844-.036266.001066-.027378.002844-.054756.002844-.0832 0-.033067-.002844-.064356-.003911-.096356.9696-.66311 2.270578-1.836089 3.2-3.37991-.539022.296888-2.156089.891377-3.6608 1.038932.965689-.521244 2.396444-2.228266 2.749867-3.585777" fill="#FFF" class="style-scope yt-icon"></path></g></g></svg>
                                </a>
                                <a href="https://www.linkedin.com/shareArticle?url={{ Request::url() }}" style="width: 60px; height: 60px; margin-left: 10px">
                                    <svg viewBox="0 0 60 60" preserveAspectRatio="xMidYMid meet" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;" class="style-scope yt-icon"><g class="style-scope yt-icon"><g fill="none" fill-rule="evenodd" class="style-scope yt-icon"><path d="M28.4863253 59.9692983c-6.6364044-.569063-11.5630204-2.3269561-16.3219736-5.8239327C4.44376366 48.4721168 3e-7 39.6467924 3e-7 29.9869344c0-14.8753747 10.506778-27.18854591 25.2744118-29.61975392 6.0281072-.9924119 12.7038532.04926445 18.2879399 2.85362966C57.1386273 10.0389054 63.3436516 25.7618627 58.2050229 40.3239688 54.677067 50.3216743 45.4153135 57.9417536 34.81395 59.5689067c-2.0856252.3201125-5.0651487.5086456-6.3276247.4003916z" fill="#0077B5" fill-rule="nonzero" class="style-scope yt-icon"></path><g fill="#FFF" class="style-scope yt-icon"><path d="M17.88024691 22.0816337c2.14182716 0 3.87817284-1.58346229 3.87817284-3.53891365C21.75841975 16.58553851 20.02207407 15 17.88024691 15 15.73634568 15 14 16.58553851 14 18.54272005c0 1.95545136 1.73634568 3.53891365 3.88024691 3.53891365M14.88888889 44.8468474h6.95851852V24.77777778h-6.95851852zM31.6137778 33.6848316c0-2.3014877 1.0888889-4.552108 3.6925432-4.552108 2.6036543 0 3.2438518 2.2506203 3.2438518 4.4970883v10.960701h6.9274074V33.1816948c0-7.9263084-4.6853333-9.29280591-7.5676049-9.29280591-2.8798518 0-4.4682469.9740923-6.2961975 3.33440621v-2.70185178h-6.9471111V44.5905129h6.9471111V33.6848316z" class="style-scope yt-icon"></path></g></g></g></svg>
                                </a>
                                <a href="https://www.tumblr.com/widgets/share/tool?shareSource=legacy&canonicalUrl=&posttype=text&content={{ Request::url() }}" style="width: 60px; height: 60px; margin-left: 10px">
                                    <svg viewBox="0 0 60 60" preserveAspectRatio="xMidYMid meet" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;" class="style-scope yt-icon"><g class="style-scope yt-icon"><g fill="none" fill-rule="evenodd" class="style-scope yt-icon"><path d="M28.486325 59.969298c-6.636404-.569063-11.56302-2.326956-16.321973-5.823932C4.443764 48.472116 0 39.646792 0 29.986934 0 15.11156 10.506778 2.798388 25.274412.36718c6.028107-.992411 12.703853.049265 18.28794 2.85363 13.576275 6.818095 19.7813 22.541053 14.64267 37.103159-3.527955 9.997705-12.789708 17.617785-23.391072 19.244938-2.085625.320112-5.065149.508645-6.327625.400391z" fill="#35465C" fill-rule="nonzero" class="style-scope yt-icon"></path><path d="M25.96539 14c0 6.948267-5.96539 8.206933-5.96539 8.206933v4.750934h4.023219v11.788089C24.023219 42.70791 27.676687 46 32.121159 46c4.444828 0 6.882486-1.768533 6.882486-1.768533v-5.240178s-1.341547 1.7664-4.08147 1.7664c-2.739568 0-3.924832-2.132622-3.924832-3.778133v-9.992178h7.00325v-5.025422h-7.00325V14H25.96539z" fill="#FFF" class="style-scope yt-icon"></path></g></g></svg>
                                </a>
                                <a href="https://www.reddit.com/submit?url={{ Request::url() }}" style="width: 60px; height: 60px; margin-left: 10px">
                                    <svg viewBox="0 0 60 60" preserveAspectRatio="xMidYMid meet" focusable="false" style="pointer-events: none; display: block; width: 100%; height: 100%;" class="style-scope yt-icon"><g class="style-scope yt-icon"><g fill-rule="nonzero" fill="none" class="style-scope yt-icon"><path d="M28.4863253 59.9692983c-6.6364044-.569063-11.5630204-2.3269561-16.3219736-5.8239327C4.44376366 48.4721168 3e-7 39.6467924 3e-7 29.9869344c0-14.8753747 10.506778-27.18854591 25.2744118-29.61975392 6.0281072-.9924119 12.7038532.04926445 18.2879399 2.85362966C57.1386273 10.0389054 63.3436516 25.7618627 58.2050229 40.3239688 54.677067 50.3216743 45.4153135 57.9417536 34.81395 59.5689067c-2.0856252.3201125-5.0651487.5086456-6.3276247.4003916z" fill="#FF4500" class="style-scope yt-icon"></path><path d="M34.1335847 43.9991814c1.6336774-.3831682 2.81654-.7939438 3.9781753-1.3815065 3.6153903-1.8286959 5.8788354-4.8645264 5.8788354-7.8849481 0-.9131088.0196207-.9556355.780668-1.6923265.6040409-.5847092.8404012-.962515 1.044679-1.6698428.2433185-.8425206.2441028-.9826228.0100139-1.7878614-.6566532-2.2588075-3.0054252-3.2764371-5.1075029-2.212882l-.8124519.4110627-.837264-.5151716c-1.6101652-.9907471-4.473974-1.96108051-6.3205111-2.14155924-.5059537-.04945042-1.143803-.1235464-1.4174535-.16465815l-.4975382-.07474783.2136595-1.06953332c.1175125-.5882423.3623778-1.7491883.5441475-2.57987956.181767-.83069153.4095191-1.95749071.5061138-2.50399817.1396137-.78991765.2348596-.99365031.4645331-.99365031.1589005 0 1.2955101.21462853 2.5257988.4769522 1.2302915.26232367 2.2622022.47695193 2.293134.47695193.0309345 0 .1003234.23497925.154203.52217616.1363137.72661143.4902897 1.17780487 1.2134714 1.54674469 1.7356128.8854428 3.6891485-.29431302 3.6891485-2.22790474 0-2.3956262-2.9538443-3.44186625-4.4550019-1.57794377-.2901205.36022881-.4356746.42625561-.7154284.32453216-.1931649-.07023833-1.5202546-.3669593-2.9490951-.65938053-1.8923676-.38728585-2.6686067-.48706487-2.8582979-.36740978-.2896185.1826864-.2522224.047706-1.0501419 3.79055007-.9490696 4.45187338-1.0064011 4.70400786-1.0882029 4.78580828-.0432388.04324046-.729551.14596475-1.5251367.22827402-2.413687.24971784-5.06621906 1.10194849-6.8544721 2.20227189l-.8268564.5087695-.81204644-.4046587c-2.11972653-1.0563058-4.47243958-.0382468-5.1287215 2.2192841-.23408885.8052386-.23330375.9453408.0100166 1.7878614.20427624.7073278.44063816 1.0851336 1.04467744 1.6698428.76105187.736691.78066878.7792177.78066878 1.6923265 0 4.172347 4.28816886 8.1540991 10.01599352 9.3002929 1.8975637.3797217 2.0263168.3894072 4.4515526.3349143 1.5849893-.0356103 2.7274992-.1508298 3.6566327-.3687526zm-6.6864685-3.0300366c-1.3154638-.2961613-2.8032079-.9569232-3.2391341-1.4386156-.34760429-.384099-.198986-.9659493.246724-.9659493.1736296 0 .5801788.1805458.9034441.4012095 2.1828306 1.4900284 7.1085991 1.484628 9.2987021-.0101767.7054363-.4814861 1.2827246-.468194 1.3538857.0311679.0334854.234998-.1164569.4687666-.4771278.7438635-1.7511846 1.3356924-5.2646974 1.8738181-8.086494 1.2385197v-.000019zm-4.01196195-5.9075609c-.81902983-.4443886-1.22403999-1.1532958-1.22477787-2.143771-.000787-1.135302.52653614-1.8699603 1.59778946-2.2257735.76240766-.253232.85344696-.2532238 1.51689516.0001492 1.785415.6818561 2.1507834 2.909296.6724678 4.0996229-.7705198.6204159-1.7299516.7214286-2.56237455.2697724zm11.09588945.0732995c-.7590038-.3947507-1.1832989-.8746601-1.3628596-1.5414995-.3321829-1.2336253.2931784-2.4377233 1.5067529-2.9011953.6634485-.253373.754488-.2533812 1.5168976-.0001492 1.0712525.3558132 1.5986343 1.0904715 1.5977903 2.2257735-.0008141 1.0085002-.4138259 1.7116813-1.2587076 2.1427072-.7599699.3877084-1.3548626.4098285-1.9998736.0743633z" fill="#FDFDFD" class="style-scope yt-icon"></path></g></g></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <input type="text" value="{{ Request::url() }}" style="text-align: center" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
