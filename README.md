
G1
Route model binding needs two things to be true. Name both, and say what happens when only one of them is.
The route parameter and controller parameter must have the same name, and the controller parameter must be type-hinted with the matching model. For example, `{medicine}` pairs with `Medicine $medicine`. If either condition is missing, Laravel cannot implicitly bind the route value to a `Medicine` model instance.

G2
Your Delete link opened the detail page instead of deleting anything. Explain why.
A normal `<a>` link sends a GET request, but Laravel's resource `destroy` route expects a DELETE request. The link also needs the ID of the specific medicine, not the collection of medicine types. Use a form with `@csrf` and `@method('DELETE')` that targets the current `$medicine`.

G3
old() takes a second argument on your edit form. What would break if you left it out, and what would break if you used only it?
The second argument provides the medicine's saved value when there is no previous form submission. Without it, fields on the edit form may appear blank when first opened. Using only the saved value instead of `old('field', $medicine->field)` means the user's submitted value will not be restored after validation fails.
