<x-base-layout :scrollspy="false">

    <x-slot:pageTitle>

        </x-slot>

        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <x-slot:headerFiles>
            <!--  BEGIN CUSTOM STYLE FILE  -->
            @vite(['resources/scss/light/assets/apps/feedbacks.scss'])

            @vite(['resources/scss/dark/assets/apps/feedbacks.scss'])
            <!--  END CUSTOM STYLE FILE  -->
            </x-slot>
            <!-- END GLOBAL MANDATORY STYLES -->

            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12">

                    <div class="row">

                        <div class="col-xl-12  col-md-12">

                            <div class="mail-box-container">

                                <div class="mail-overlay"></div>

                                <div class="tab-title">
                                    <div class="row">

                                        <div class="col-md-12 col-sm-12 col-12 mail-categories-container">

                                            <div class="mail-sidebar-scroll">

                                                <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                                    <li class="nav-item">
                                                        <a class="nav-link list-actions active" id="mailInbox"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-inbox">
                                                                <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                                                                <path d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"></path>
                                                            </svg> <span class="nav-names">Feedbacks</span> <span class="mail-badge badge"></span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link list-actions" id="important"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-star">
                                                                <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                                                            </svg> <span class="nav-names">Suggestions</span></a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link list-actions" id="draft"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail">
                                                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                                                                <polyline points="22,6 12,13 2,6" />
                                                            </svg> <span class="nav-names">Complaints</span> <span class="mail-badge badge"></span></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                $images = [
                                'resources/images/profile-1.jpeg',
                                'resources/images/profile-2.jpeg',
                                'resources/images/profile-3.jpeg',
                                'resources/images/profile-4.jpeg',
                                'resources/images/profile-5.jpeg',
                                'resources/images/profile-6.jpeg',
                                'resources/images/profile-7.jpeg',
                                'resources/images/profile-8.jpeg',
                                'resources/images/profile-9.jpeg',
                                'resources/images/profile-10.jpeg',
                                ];
                                @endphp

                                <div id="mailbox-inbox" class="accordion mailbox-inbox">

                                    <div class="search">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu mail-menu d-lg-none">
                                            <line x1="3" y1="12" x2="21" y2="12"></line>
                                            <line x1="3" y1="6" x2="21" y2="6"></line>
                                            <line x1="3" y1="18" x2="21" y2="18"></line>
                                        </svg>
                                        <input type="text" class="form-control input-search" placeholder="Search Here...">
                                    </div>
                                    <div class="message-box">
                                        <div class="message-box-scroll" id="ct">
                                            @foreach($feedbacks as $fb)
                                            @if($fb['feedback_type'] == "feedback")
                                            <div id="unread-verification-link" class="mail-item mailInbox feedbacks">
                                                <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingEleven">
                                                    <div class="mb-0">
                                                        <div class="mail-item-heading social collapsed" data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseEleven" aria-expanded="false">
                                                            <div class="mail-item-inner">

                                                                <div class="d-flex">
                                                                    <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                                        <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default6">
                                                                    </div>
                                                                    <div class="f-head">
                                                                        <img src="{{Vite::asset($images[array_rand($images)])}}" class="user-profile" alt="avatar">
                                                                    </div>
                                                                    <div class="f-body">
                                                                        <div class="meta-mail-time">
                                                                            <p class="user-email" data-mailTo="{{$fb['user_email']}}">{{$fb['username']}}</p>
                                                                            <input type="hidden" id="senderEmail" value="{{$fb['user_email']}}">
                                                                        </div>
                                                                        <div class="meta-title-tag">
                                                                            <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"{{$fb['user_msg']}}"}]}'><span class="mail-title" data-mailTitle="{{$fb['msg_title']}}">{{$fb['msg_title']}} - </span> {{$fb['user_msg']}}</p>
                                                                            <div class="tags">
                                                                                <span class="g-dot-primary"></span>
                                                                                <span class="g-dot-warning"></span>
                                                                                <span class="g-dot-success"></span>
                                                                                <span class="g-dot-danger"></span>
                                                                            </div>
                                                                            <p class="meta-time align-self-center">8 Feb</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach

                                            @foreach($feedbacks as $fb)
                                            @if($fb['feedback_type'] == "suggestion")
                                            <div class="mail-item important suggestions">
                                                <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingFourteen">
                                                    <div class="mb-0">
                                                        <div class="mail-item-heading work collapsed" data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseFourteen" aria-expanded="false">
                                                            <div class="mail-item-inner">

                                                                <div class="d-flex">
                                                                    <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                                        <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default14">
                                                                    </div>
                                                                    <div class="f-head">
                                                                        <img src="{{Vite::asset($images[array_rand($images)])}}" class="user-profile" alt="avatar">
                                                                    </div>
                                                                    <div class="f-body">
                                                                        <div class="meta-mail-time">
                                                                            <p class="user-email" data-mailTo="reevesErnest@mail.com">{{$fb['username']}}</p>
                                                                        </div>
                                                                        <div class="meta-title-tag">
                                                                            <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"{{$fb['user_msg']}}"}]}'><span class="mail-title" data-mailTitle="{{$fb['msg_title']}}">{{$fb['msg_title']}} - </span>{{$fb['user_msg']}}</p>
                                                                            <div class="tags">
                                                                                <span class="g-dot-primary"></span>
                                                                                <span class="g-dot-warning"></span>
                                                                                <span class="g-dot-success"></span>
                                                                                <span class="g-dot-danger"></span>
                                                                            </div>
                                                                            <p class="meta-time align-self-center">25 Dec</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach

                                            @foreach($feedbacks as $fb)
                                            @if($fb['feedback_type'] == "complain")
                                            <div class="mail-item draft complaints">
                                                <div class="animated animatedFadeInUp fadeInUp" id="mailHeadingSeventeen">
                                                    <div class="mb-0">
                                                        <div class="mail-item-heading personal collapsed" data-bs-toggle="collapse" role="navigation" data-bs-target="#mailCollapseSeventeen" aria-expanded="false">
                                                            <div class="mail-item-inner">

                                                                <div class="d-flex">
                                                                    <div class="form-check form-check-primary form-check-inline mt-1" data-bs-toggle="collapse" data-bs-target>
                                                                        <input class="form-check-input inbox-chkbox" type="checkbox" id="form-check-default17">
                                                                    </div>
                                                                    <div class="f-head">
                                                                        <img src="{{Vite::asset($images[array_rand($images)])}}" class="user-profile" alt="avatar">
                                                                    </div>
                                                                    <div class="f-body">
                                                                        <div class="meta-mail-time">
                                                                            <p class="user-email" data-mailTo="marleneWood@mail.com">{{$fb['username']}}</p>
                                                                        </div>
                                                                        <div class="meta-title-tag">
                                                                            <p class="mail-content-excerpt" data-mailDescription='{"ops":[{"insert":"{{$fb['user_msg']}}"}]}'><span class="mail-title" data-mailTitle="{{$fb['msg_title']}}">{{$fb['msg_title']}} - </span>{{$fb['msg_title']}}</p>
                                                                            <div class="tags">
                                                                                <span class="g-dot-primary"></span>
                                                                                <span class="g-dot-warning"></span>
                                                                                <span class="g-dot-success"></span>
                                                                                <span class="g-dot-danger"></span>
                                                                            </div>
                                                                            <p class="meta-time align-self-center">29 Nov</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                            @endforeach

                                        </div>
                                    </div>

                                    <div class="content-box">
                                        <div class="d-flex msg-close">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left close-message">
                                                <line x1="19" y1="12" x2="5" y2="12"></line>
                                                <polyline points="12 19 5 12 12 5"></polyline>
                                            </svg>
                                            <h2 class="mail-title" data-selectedMailTitle=""></h2>
                                        </div>

                                        <div id="mailCollapseEleven" class="collapse" aria-labelledby="mailHeadingEleven" data-bs-parent="#mailbox-inbox">
                                            <div class="mail-content-container mailInbox" data-mailfrom="" data-mailto="asd" data-mailcc="">

                                                <div class="d-flex justify-content-between mb-5">
                                                    <div class="d-flex user-info">
                                                        <div class="f-head">
                                                            <img src="{{Vite::asset($images[array_rand($images)])}}" class="user-profile" alt="avatar">
                                                        </div>
                                                        <div class="f-body">
                                                            <div class="meta-title-tag">
                                                                <h4 class="mail-usr-name" data-mailtitle="Verification Link"></h4>
                                                            </div>
                                                            <div class="meta-mail-time">
                                                                <p class="user-email" data-mailto="ssd"></p>
                                                                <p class="mail-content-meta-date">12/08/2022 -</p>
                                                                <p class="meta-time align-self-center">11:09 AM</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="action-btns">
                                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply">
                                                                <polyline points="9 14 4 9 9 4"></polyline>
                                                                <path d="M20 20v-7a4 4 0 0 0-4-4H4"></path>
                                                            </svg>
                                                        </a>
                                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward">
                                                                <polyline points="15 14 20 9 15 4"></polyline>
                                                                <path d="M4 20v-7a4 4 0 0 1 4-4h12"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>

                                                <p class="mail-content" data-mailTitle="Verification Link" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                <p>Best Regards,</p>
                                                <p>Kirsten Beck</p>

                                            </div>
                                        </div>

                                        <div id="mailCollapseFourteen" class="collapse" aria-labelledby="mailHeadingFourteen" data-bs-parent="#mailbox-inbox">
                                            <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="reevesErnest@mail.com" data-mailcc="">

                                                <div class="d-flex justify-content-between mb-5">
                                                    <div class="d-flex user-info">
                                                        <div class="f-head">
                                                            <div class="avatar avatar-sm">
                                                                <span class="avatar-title rounded-circle">E</span>
                                                            </div>
                                                        </div>
                                                        <div class="f-body">
                                                            <div class="meta-title-tag">
                                                                <h4 class="mail-usr-name" data-mailtitle="Youtube">Youtube</h4>
                                                            </div>
                                                            <div class="meta-mail-time">
                                                                <p class="user-email" data-mailto="reevesErnest@mail.com">reevesErnest@mail.com</p>
                                                                <p class="mail-content-meta-date">06/02/2022 -</p>
                                                                <p class="meta-time align-self-center">8:25 PM</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="action-btns">
                                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply">
                                                                <polyline points="9 14 4 9 9 4"></polyline>
                                                                <path d="M20 20v-7a4 4 0 0 0-4-4H4"></path>
                                                            </svg>
                                                        </a>
                                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward">
                                                                <polyline points="15 14 20 9 15 4"></polyline>
                                                                <path d="M4 20v-7a4 4 0 0 1 4-4h12"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>

                                                <p class="mail-content" data-mailTitle="Youtube" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                <p>Best Regards,</p>
                                                <p>Ernest Reeves</p>

                                            </div>
                                        </div>

                                        <div id="mailCollapseSeventeen" class="collapse" aria-labelledby="mailHeadingSeventeen" data-bs-parent="#mailbox-inbox">
                                            <div class="mail-content-container mailInbox" data-mailfrom="info@mail.com" data-mailto="infocompany@mail.com" data-mailcc="">

                                                <div class="d-flex justify-content-between mb-5">
                                                    <div class="d-flex user-info">
                                                        <div class="f-head">
                                                            <img src="{{Vite::asset('resources/images/profile-18.jpeg')}}" class="user-profile" alt="avatar">
                                                        </div>
                                                        <div class="f-body">
                                                            <div class="meta-title-tag">
                                                                <h4 class="mail-usr-name" data-mailtitle="eBill">eBill</h4>
                                                            </div>
                                                            <div class="meta-mail-time">
                                                                <p class="user-email" data-mailto="infocompany@mail.com">infocompany@mail.com</p>
                                                                <p class="mail-content-meta-date">11/25/2021 -</p>
                                                                <p class="meta-time align-self-center">1:51 PM</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="action-btns">
                                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Reply">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left reply">
                                                                <polyline points="9 14 4 9 9 4"></polyline>
                                                                <path d="M20 20v-7a4 4 0 0 0-4-4H4"></path>
                                                            </svg>
                                                        </a>
                                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" data-original-title="Forward">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-right forward">
                                                                <polyline points="15 14 20 9 15 4"></polyline>
                                                                <path d="M4 20v-7a4 4 0 0 1 4-4h12"></path>
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>

                                                <p class="mail-content" data-mailTitle="eBill" data-maildescription='{"ops":[{"insert":"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pulvinar feugiat consequat. Duis lacus nibh, sagittis id varius vel, aliquet non augue. Vivamus sem ante, ultrices at ex a, rhoncus ullamcorper tellus. Nunc iaculis eu ligula ac consequat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vestibulum mattis urna neque, eget posuere lorem tempus non. Suspendisse ac turpis dictum, convallis est ut, posuere sem. Etiam imperdiet aliquam risus, eu commodo urna vestibulum at. Suspendisse malesuada lorem eu sodales aliquam.\n"}]}'> Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. </p>

                                                <p>Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.</p>

                                                <p>Best Regards,</p>
                                                <p>Info Company</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--  BEGIN CUSTOM SCRIPTS FILE  -->
            <x-slot:footerFiles>
                <script src="{{asset('plugins/global/vendors.min.js')}}"></script>
                <script src="{{asset('plugins/editors/quill/quill.js')}}"></script>
                @vite(['resources/assets/js/apps/feedbacks.js'])
                </x-slot>
                <!--  END CUSTOM SCRIPTS FILE  -->
</x-base-layout>