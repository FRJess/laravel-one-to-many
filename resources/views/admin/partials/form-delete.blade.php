<form onsubmit="return confirm('Do you want to delete {{ $entity->name }}?')" class="d-inline"
  action="{{ route('admin.' . $route . '.destroy', $entity) }}" method="POST">
  @csrf
  @method('DELETE')

  <button type="submit" class="btn btn-danger" title="delete">
    <i class="fa-solid fa-trash"></i>
  </button>

</form>
