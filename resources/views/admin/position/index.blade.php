@extends('admin.layouts.app')

@section('title')
Position List
@endsection

@section('content')
<section class="content pt-4">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-cyan">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Position List') : 'Position List' }}
                        </h3>
                        <a href="{{ route('admin.position.create') }}" class="btn btn-success float-right"><i class="fa fa-plus"></i>
                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Add Position') : 'Add Position' }}
                    </a>
                    </div>

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                   <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Sl') : 'Sl' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Name') : 'Name' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Status') : 'Status' }}
                                    </th>

                                    <th>
                                        {{ session('locale') == 'ar' ? \App\Helpers\TranslateHelper::toArabic('Action') : 'Action' }}
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $item)
                               
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                   <td>
                                         {{ session('locale', 'en') == 'ar' ? \App\Helpers\TranslateHelper::toArabic($item->name) : $item->name }}
                                    </td>
                                   <td>
                                        @if($item->status == 1)
                                            <span class="badge bg-success">
                                                {{ session('locale') == 'ar' 
                                                ? \App\Helpers\TranslateHelper::toArabic('Active') 
                                                : 'Active' }}
                                            </span>
                                        @else
                                            <span class="badge bg-danger">
                                                 {{ session('locale') == 'ar' 
                                                ? \App\Helpers\TranslateHelper::toArabic('Deactive') 
                                                : 'Deactive' }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.position.edit', $item->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
            
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('admin.position.destroy', $item->id) }}" method="POST" style="display: none;">
                                            @csrf @method('DELETE')
                                        </form>
                                        <a href="#" class="btn btn-sm btn-danger delete-btn" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></a>
                                       
                                    </td>
                                </tr>
                                
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</section>

@endsection