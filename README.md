// namespace App\Http\Controllers\admin;
// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Models\ContactUs;


// class QueryController extends Controller
// {
//     public function index()
//     {
//         $queries = ContactUs::latest()->get();  // Get all queries from DB
//         return view('admin.queries.index', compact('queries'));
//     }

//     public function respond(Request $request, $id)
//     {
//         $request->validate([
//             'admin_response' => 'required|string',
//         ]);

//         $query = ContactUs::findOrFail($id);
//         $query->admin_response = $request->input('admin_response');
//         $query->save();

//         return redirect()->back()->with('success', 'Response sent successfully!');
//     }
// }