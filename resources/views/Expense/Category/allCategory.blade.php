@extends('master.app')
@section('content')
<div class="content-wrapper bg-white">
    <div class="row">
        <div class="col-lg-8 bg-white mx-auto mt-5">
            <div class="card bg-white">
            <h4 class="card-header">All Expense Categories</h4>

                <div class="card-body bg-white">
                    <div class="bg-white">
                        <form action="" method="GET">
                            <div class="form-group row">
                                <label class="col-md-6">
                                    <input type="text" class="form-control bg-white" name="categorySearch" id="categorySearch" onkeyup="myFunction()" placeholder="Search"/>
                                </label>
                                <div class="col-md-6 ml-0">
                                    <span class="float-right col-md-6"><a href="{{route('add.exp.category')}}" class="btn btn-success float-right">+Add</a></span>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0" id="myTable">
                            <thead class="bg-orange">
                            <tr class="text-light">
                                <th>#</th>
                                <th>Category Name</th>
                                <th>Category Code</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($categories as $category)


                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->code}}</td>
                                    <td>
                                        <a href="/category-edit/{{$category->id}}" class="btn btn-success btn-sm me-1" title="Update">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a  class="btn btn-danger btn-sm" id="delete" title="Delete" href="javascript:void(0)" data-url="{{ route('CategoryInfo', $category->id) }}" >
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-danger">Project Category Delete</h5>
                </div>
                <div class="modal-body">
                        <span class="text-dark">Are you sure to delete this Project Category?</span>
                </div>
                <div class="modal-footer">
                <form action="{{route('categoryDelete')}}" class="form-group" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input type="hidden" id="user-id" name="id">
                    <input type="submit" class="btn btn-danger me-1" id="yes" value="Yes">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" >No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('body').on('click', '#delete', function () {
                var userURL = $(this).data('url');
                $.get(userURL, function (data) {
                    $('#deleteModal').modal('show');
                    $('#user-id').val(data.id);

                })
            });
        });
    </script>
    <script>
        function create()
        {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 9000
            });
            event.preventDefault();
            Toast.fire({
                icon: 'success',
                title: 'Project Category Created Successfully'
            })
        }
        function wise_words()
        {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 9000
            });
            event.preventDefault();
            Toast.fire({
                icon: 'error',
                title: 'Project Category Deleted Successfully'
            })
        }
        function update()
        {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 9000
            });
            event.preventDefault();
            Toast.fire({
                icon: 'success',
                title: 'Project Category Updated Successfully'
            })
        }

        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("categorySearch");
            filter = input.value.toUpperCase();
             table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                 td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        } else {
                        tr[i].style.display = "none";
            }
        }
     }
}
    </script>
</div>
@endsection
