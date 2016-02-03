<div class="container">
    <div class="row">
        <div class="btn-group btn-group-justified">
            <div class="btn-group">
                <button type="button" class="btn btn-nav">
                    <span class="glyphicon glyphicon-folder-close"></span>
                    <p>Shopping</p>
                </button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-nav">
                    <span class="glyphicon glyphicon-calendar"></span>
                    <p>Calendar</p>
                </button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-nav">
                    <span class="glyphicon glyphicon-globe"></span>
                    <p>Network</p>
                </button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-nav">
                    <span class="glyphicon glyphicon-leaf"></span>
                    <p>Ecology</p>
                </button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-nav">
                    <span class="glyphicon glyphicon-time"></span>
                    <p>Statistics</p>
                </button>
            </div>
            <div class="btn-group">
                <button type="button" class="btn btn-nav" data-toggle="modal" data-target="#login-modal">
                        <span class="glyphicon glyphicon-user"></span>
                        <p>Events</p>
                </button>
            </div>
        </div>
    </div>
</div>

@if(count($errors) >0 )
    <ul>
        @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
@endif

<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="loginmodal-container">
            <h1>Login to Your Account</h1><br>
            <form method="POST" action="{!! route('login') !!}">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="text" name="username" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="login" class="login loginmodal-submit" value="Login">
            </form>

            <div class="login-help">
                <!-- <a href="#">Register</a> - <a href="#">Forgot Password</a> --->
            </div>
        </div>
    </div>
</div>