<html>
<div style="background-color: rgba(217,237,252,0.4)">
    @foreach($users as $user)
        <div style="background-color: rgba(175,169,252,0.4); margin: auto">
            <div style="margin: 10px">
                User: <a href="/admin/user">{{$user->name}}</a>
            </div>

            <div>
                    <table style="width:50%">
                        <tr style="background-color: rgba(16,0,255,0.4)">
                            <th>Role</th>
                            <th>Ownership</th>
                        </tr>
                        @foreach($roles as $role)
                            <tr>
                                <td style="background-color: rgba(17,94,255,0.4)">{{$role->name}}</td>
                                @if($user->hasRole($role->name))
                                    <td style="background-color: rgba(36,255,0,0.4)">Yes</td>
                                @else
                                    <td style="background-color: rgba(255,7,33,0.4)">No</td>
                                @endif

                            </tr>
                        @endforeach
                    </table>
                <br>
                <button type="button" onclick="window.location='{{ url("/admin/users/".$user->id) }}'">View Profile</button>
            </div>
            <hr>
        </div>
    @endforeach
</div>

</html>
