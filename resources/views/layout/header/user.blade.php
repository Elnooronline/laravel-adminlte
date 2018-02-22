<!-- User Account: style can be found in dropdown.less -->
<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="{{ AdminLte::getGravatar(auth()->user()->email) }}" class="user-image" alt="{{ auth()->user()->name }}">
        <span class="hidden-xs">{{ auth()->user()->name }}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="{{ AdminLte::getGravatar(auth()->user()->email) }}" class="img-circle" alt="{{ auth()->user()->name }}">
            <p>
                {{ auth()->user()->name }}
                @if ($created_at = auth()->user()->created_at)
                    <small>
                        Member since
                        <span title="{{ $created_at }}">
                            {{ $created_at->diffForHumans() }}
                        </span>
                    </small>
                @endif
            </p>
        </li>

        <!-- Menu Body -->
        <li class="user-body">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                </div>
            </div>
            <!-- /.row -->
        </li>
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <a href="#" class="btn btn-default btn-flat">Sign out</a>
            </div>
        </li>
    </ul>
</li>
