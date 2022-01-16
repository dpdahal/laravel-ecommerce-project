<?php

namespace App\Http\Controllers\Backend;

use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeController extends BackendController
{

    public function index()
    {
        $this->date('attributeData', Attribute::all());
        return view($this->pagePath . 'attribute.index', $this->data);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'attribute_name' => 'required|unique:attributes,attribute_name'
        ]);

        if (Attribute::create($request->all())) {
            return redirect()->back()->with('success', 'Data was inserted');
        } else {
            return redirect()->back()->with('error', 'Data not was inserted');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function addAttributeValue(Request $request)
    {
        if ($request->isMethod('get')) {
            $this->date('attributeValueData', AttributeValue::where('attribute_id', '=', $request->criteria)->get());
            return view($this->pagePath . 'attribute.attribute-value', $this->data);
        }

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'attribute_value' => 'required',
            ]);

            $data['attribute_value'] = $request->attribute_value;
            $data['attribute_id'] = $request->criteria;
            if (AttributeValue::create($data)) {
                return redirect()->back()->with('success', 'Data was inserted');
            } else {
                return redirect()->back()->with('error', 'Data was not inserted');

            }

        }
    }
}
