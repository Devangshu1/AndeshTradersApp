@include('includes.header')

@include('includes.ecom_nav')

<div class="container">
    <section class="content">
    <div class="card">
    <div class="card-header">
        <div class="card-title">User Details</div>
    </div>
    <form action="{{route('ecom.user.db',$user[0]->user_id)}}" method="POST">
        @csrf
    <div class="card-body">
        <table class="table">
            <tr>
                <td><b>User Id: </b></td>
                <td>{{$user[0]->user_id}}</td>
            </tr>
            <tr>
                <td><b>Email: </b></td>
                <td>{{$user[0]->e_email}}</td>
            </tr>
            <tr>
                <td><b>Username: </b></td>
                <td>{{$user[0]->username}}</td>
            </tr>
            <div class="form-group">
            <tr>
                <td><label for="add_phone">Phone No: </label></td>
                <td><input
                    @isset($user[0]->phoneno) type="text" @else type="number" @endisset
                     id="add_phone" name="add_phone" class="form-control @error('add_phone') is-invalid @enderror" placeholder="Enter phone number" min="1000000000" max="9999999999" value="@isset($user[0]->phoneno) {{$user[0]->phoneno}} @else {{old('add_phone')}} @endisset" @iseet($user[0]->phoneno) disabled @endisset>
                <div class="text-danger">
                    @error('add_phone')
                      {{$message}}
                    @enderror
                </div>
                </td>
            </tr>
            </div>
            <div class="form-group">
            <tr>
                <td><label for="add_address">Address: </label></td>
                <td><textarea type="text" id="add_address" name="add_address" class="form-control @error('add_address') is-invalid @enderror" placeholder="Enter address" row="3" @isset($user[0]->address) disabled @endisset>@isset($user[0]->address){{$user[0]->address}}@else{{old('add_address')}}@endisset</textarea>
                <div class="text-danger">
                @error('add_address')
                    {{$message}}
                @enderror
                </div>
                </td>
            </tr>
            </div>
            <div class="form-group">
            <tr>
                <td><label for="add_account_no">Account Number: </label></td>
                <td><input @isset($account[0]->account_no) type="text" @else type="number" @endisset
                    id="add_account_no" name="add_account_no" class="form-control @error('add_account_no') is-invalid @enderror" placeholder="Enter account number" min="1000000000" value="@isset($account[0]->account_no) {{$account[0]->account_no}} @else {{old('add_account_no')}} @endisset" @isset($account[0]->account_no) disabled @endisset>
                <div class="text-danger">
                @error('add_account_no')
                    {{$message}}
                @enderror
                </div>
                </td>
            </tr>
            </div>
            <div class="form-group">
            <tr>
                <td><label for="add_ifsc">IFSC Code: </label></td>
                <td><input type="text" id="add_ifsc" name="add_ifsc" class="form-control @error('add_ifsc') is-invalid @enderror" placeholder="Enter IFSC code" value="@isset($account[0]->ifsc_code) {{$account[0]->ifsc_code}} @else {{old('add_ifsc')}} @endisset" @isset($account[0]->ifsc_code) disabled @endisset>
                <div class="text-danger">
                @error('add_ifsc')
                    {{$message}}
                @enderror
                </div>
                </td>
            </tr>
            </div>
            <div class="form-group">
            <tr>
                <td><label for="add_bank_name">Bank Name: </label></td>
                <td><input type="text" id="add_bank_name" name="add_bank_name" class="form-control @error('add_bank_name') is-invalid @enderror" placeholder="Enter bank name"  value="@isset($account[0]->bank_name) {{$account[0]->bank_name}} @else {{old('add_bank_name')}} @endisset"  @isset($account[0]->bank_name) disabled @endisset>
                <div class="text-danger">
                @error('add_bank_name')
                    {{$message}}
                @enderror
                </div>
                </td>
            </tr>
            </div>
            <div class="form-group">
            <tr>
                <td><label for="add_branch">Branch Name: </label></td>
                <td><input type="text" id="add_branch" name="add_branch" class="form-control @error('add_branch') is-invalid @enderror" placeholder="Enter branch name" value="@isset($account[0]->branch_name) {{$account[0]->branch_name}} @else {{old('add_branch')}} @endisset" @isset($account[0]->branch_name) disabled @endisset>
                <div class="text-danger">
                @error('add_branch')
                    {{$message}}
                @enderror
                </div>
                </td>
            </tr>
            </div>
        </table>
    </div>
    <div class="card-footer d-flex flex-row-reverse">
        @if (session('user_login'))
        @isset($account[0]->branch_name)
        <a href="{{route('ecom')}}" type="button" class="btn btn-secondary mr-2">< Back</a>
        @else
        <button type="submit" class="btn btn-primary mr-2">Save</button>
        <a href="{{route('ecom')}}" type="button" class="btn btn-secondary mr-2">Cancle</a>
        @endisset
        @endif
    </div>
    </form>
    </div>
    </section>
</div>

@include('includes.footer')