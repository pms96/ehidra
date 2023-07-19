@php
$randomKey = time();
@endphp
<div class="card">
    <div class="card-body bg-blue-100">

        <div class="md:flex mb-6">
            <div class="md:w-1/3">
                <legend class="text-gray-900 uppercase tracking-wide text-sm">{{$user['name']}} ({{$user['id']}})</legend>
            </div>
            <div class="md:flex-1 mt-2 mb:mt-0 md:px-3">
                <div class="mb-4" id="dataUser{{$user['id']}}">
                    <form>
                        @csrf
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="name" class="block mb-2 font-medium">Name</label>
                                <input type="text" id="name{{$user['id']}}" value="{{$user['name']}}" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                            </div>
                            <div>
                                <label for="email" class="block mb-2 font-medium">Email:</label>
                                <input type="text" id="email{{$user['id']}}" value="{{$user['email']}}" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                            </div>
                            <div class="col-span-2">
                                <label class="block mb-2 font-medium">Password:</label>
                                <input type="password" id="password{{$user['id']}}" value="" class="w-full px-4 py-2 border border-gray-300 rounded-md" required>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button class="bg-blue-700 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded m-2" name="editUser" id="editUser" onclick="editUser('{{$user['id']}}')">Guardar</button>
        </div>
    </div>
</div>

<script type="text/javascript">
    function editUser(id) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var params = {
            '_token':'{{ csrf_token() }}',
            'id':id,
            'name': document.getElementById('name'+id).value,
            'email': document.getElementById('email'+id).value,
            'password': document.getElementById('password'+id).value,
        };
        const url = "{{Route('updateUser')}}";

        $.ajax({
            data: params,
            url: url,
            type: 'post',
            timeout: 2000,
            async: true,
            success: function (response){
                
                if(response == '200'){
                    location.reload();
                }else{
                    Swal.fire({
                        title: 'Error!',
                        text: response,
                        icon: 'error',
                        confirmButtonText: 'Cerrar'
                    })
                }             

            }
        })
    }
</script>