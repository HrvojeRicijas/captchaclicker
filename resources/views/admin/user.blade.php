<html>
<div>
        User: {{$user->name}}
        <br>
        <br>
        Roles:
        <div>
            <form method="POST" action="/admin/users/{{$user->id}}">
                @csrf
                @foreach($roles as $role)
                    <br>
                    <label class="container">{{$role->name}}
{{--                        <input name="{{$role->name}}" type="checkbox" @if($user->hasRole($role->name))checked="checked" @endif @if($role->id <= $currentUser->roles[0]->id) disabled @endif>--}}
                        @if(($role->id <= $currentUser->roles[0]->id) and $user->hasRole($role->name))
                            <input type="hidden" name="roles[]"  value="{{ $role->name  }}">
                        @endif
                        <input name="roles[]" type="checkbox" value="{{ $role->name  }}" @if($user->hasRole($role->name))checked="checked" @endif @if($role->id <= $currentUser->roles[0]->id) disabled @endif>

                        <span class="checkmark"></span>
                    </label>
                @endforeach
                <br>
                <input type="submit" id="submit" name="submit" value="submit">
            </form>
        </div>
    <a href="/">Home</a>
        <hr>
</div>

</html>
