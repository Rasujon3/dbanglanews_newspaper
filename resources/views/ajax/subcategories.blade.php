<option value="" selected="" disabled="">Select Subcategory</option>
@foreach($subcategories as $subcategory)
<option value="{{$subcategory->id}}">{{$subcategory->subcategory_name}}</option>
@endforeach