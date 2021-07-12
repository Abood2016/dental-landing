<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
        data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item " aria-haspopup="true">
                <a href="{{ route('dashboard.index') }}" class="menu-link">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                        <svg xmlns="{{ asset('backend_assets/media/svg/icons/Design/Layers.svg') }}"
                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24"
                            version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path
                                    d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                    fill="#000000" fill-rule="nonzero" />
                                <path
                                    d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">لوحة التحكم</span>
                </a>
            </li>

            <?php
            $parent = \DB::table('side_menu_links')->where('deleted_at',null)->where('showinmenu',1)->where('parent_id','=',null)->get();

            ?>
            @foreach($parent as $row)

            <li class="menu-item menu-item-submenu" id="parent_{{$row->id}}" aria-haspopup="true" data-menu-toggle="hover">
            @can($row->url)
                <a href="javascript:;" class="menu-link menu-toggle">
                    <span class="svg-icon menu-icon">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                        <span class="svg-icon menu-icon">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                            <span class=" {{$row->icon}}">
                                <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo1/dist/../src/media/svg/icons/Design/Flatten.svg-->
                                <!--end::Svg Icon--></span>
                            <!--end::Svg Icon--></span>
                        <!--end::Svg Icon-->
                    </span>
                    <!--end::Svg Icon-->
                    </span>
                    <span class="menu-text">{{$row->title}}</span>
                    <i class="menu-arrow"></i>
                </a>
                @endcan
                <div class="menu-submenu">
                    <i class="menu-arrow"></i>
                    <ul class="menu-subnav">
                        <li class="menu-item menu-item-parent " aria-haspopup="true">
                            <span class="menu-link">
                                <span class="menu-text">{{$row->title}}</span>
                            </span>
                        </li>
                        <?php
                        $child = \DB::table('side_menu_links')->where('deleted_at',null)->where('showinmenu',1)->where('parent_id','=',$row->id)->get();
                        ?>

                        @foreach($child as $item)
                            @can($item->url)
                                <?php
                                $current_domain = env('APP_URL');
                                $result = str_replace($current_domain."/","",route($item->url));
                             if (request()->is($result)){
                                 ?>

                            <script>
                                document.addEventListener("DOMContentLoaded", function(){
                                    let parent = `{{$item->parent_id}}`;

                                    $("#parent_"+parent).addClass('menu-item-open');
                                });
                            </script>
                                <?php } ?>
                        <li class="menu-item {{
                request()->is($result)?"menu-item-active":" "}}" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ route($item->url) }}" class="menu-link menu-toggle ">
                                <i class="menu-bullet {{$item->icon}}">
                                    <span class="mr-2"></span>
                                </i>
                                <span class="menu-text">{{$item->title}}</span>
                            </a>

                        </li>
                            @endcan
                        @endforeach


                    </ul>
                </div>
            </li>
            @endforeach

        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
