@foreach ($categories as $category)
    @if ($category->parent_id == $parentId)
        <tr>
        @if ($str == '')
            <td><strong> {{ $category->name }}</strong> </td>
        @else
            <td>{{ $str . $category->name }}</td>
        @endif
        <td> {{ $category->created_at->diffForHumans() }} </td>
            <td><a href="{{ route('category.edit', $category->id) }}" ><button class="btn btn-link" ><i class="editu fa fa-edit"></i></button></a> </td>
            <td>
                <form action="{{ route('category.destroy', $category->id) }}" method="POST" >
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="deleteu btn-link" onclick="return confirm('Do you want to delete ?')" ><i class="deleteu fa fa-times"></i></button>
                </form>
            </td>
            </tr>
        @include('admin.category.recursive', [
            'categories' => $categories,
            'parentId' => $category->id,
            'str' => $str .'------ ',
        ])
    @endif
@endforeach
