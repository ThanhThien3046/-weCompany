<div id="sidebar" class="sidebar">
    <div class="sidebar__fixed">
        <a class="logo" href="{{ Route('HOME_PAGE') }}">
            <img class="logo__img" src="{{ asset('/images/logo-wecompany.png') }}" alt="admin">
            <span class="logo__text">
                WE
                <i class="logo__mini_text">company</i>
                <i class="logo__box_pro">pro</i>
            </span>
        </a>
        <a class="navigate_default {{ Route::is("ADMIN_DASHBOARD") ? 'active' : null}}" 
            href="{{ Route('ADMIN_DASHBOARD') }}">
            <i class="hero-icon hero-palette-outline"></i>
            <span class="nav__text">dashboard</span>
        </a>
        
        <ul class="nav_list">
            
            <li class="block_navigate {{ Route::is("ADMIN_STORE_OPTION") ? 'active' : null}}">
                <a class="block_navigate__link" 
                href="{{ Route('ADMIN_STORE_OPTION') }}">
                    <i class="hero-icon hero-segment"></i>
                    <span class="nav__text">Option</span>
                </a>
            </li>

            <li class="block_navigate {{ Route::is("ADMIN_STORE_BRANCH", "ADMIN_LOAD_BRANCH") ? 'active' : null}}" >
                <a class="block_navigate__link">
                    <i class="hero-icon hero-tag"></i>
                    <span class="nav__text">Branch - we group</span>
                    <i class="hero-icon hero-chevron-sidebar"></i>
                </a>
                <ul class="dropdown__item">
                    <li class="{{ Route::is("ADMIN_STORE_BRANCH") ? 'active' : null}}">
                        <a href="{{ Route('ADMIN_STORE_BRANCH') }}">
                            Save we
                        </a>
                    </li>
                    <li class="{{ Route::is("ADMIN_LOAD_BRANCH") ? 'active' : null}}">
                        <a href="{{ Route('ADMIN_LOAD_BRANCH') }}">
                            List we
                        </a>
                    </li>
                </ul>
            </li>
            <li class="block_navigate {{ Route::is("ADMIN_STORE_POST", "ADMIN_LOAD_POST") ? 'active' : null}}" >
                <a class="block_navigate__link">
                    <i class="hero-icon hero-file-document-edit-outline"></i>
                    <span class="nav__text">Post</span>
                    <i class="hero-icon hero-chevron-sidebar"></i>
                </a>
                <ul class="dropdown__item">
                    <li class="{{ Route::is("ADMIN_STORE_POST") ? 'active' : null}}">
                        <a href="{{ Route('ADMIN_STORE_POST') }}">
                            Save Post
                        </a>
                    </li>
                    <li class="{{ Route::is("ADMIN_LOAD_POST") ? 'active' : null}}">
                        <a href="{{ Route('ADMIN_LOAD_POST') }}">
                            List Post
                        </a>
                    </li>
                </ul>
            </li>
            
        </ul>
        <span class="toggle_navigate" onclick="toggle_sidebar(this)">
            <i class="js_toggle_navigate__icon hero-icon hero-chevron-double-left"></i>
        </span>
    </div>
</div>