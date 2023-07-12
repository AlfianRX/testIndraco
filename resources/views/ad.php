<h3 className='text-red mb-4'>List Product</h3>

                        <Table striped hover bordered size="lg" variant="light">
                        <thead>
                        <tr>
                            <th width="1%" className="text-center">No</th>
                            <th className="text-center">Image</th>
                            <th className="text-center">Name</th>
                            <th className="text-center">Stock</th>
                            <th className="text-center">Price</th>
                            <th className="text-center">Description</th>
                            <th colSpan={2} className="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr key={index}>
                            <td className="align-middle text-center">1</td>
                            <td className="align-middle">
                            <img
                                src="{{asset('images/kopi2.png')}}";
                                style="width: 80px;
                                height: 80px;
                                objectFit: cover;"
                                alt="null"
                                />
                            </td>
                            <td className='align-middle'>Kopi</td>
                            <td className='align-middle'>5</td>
                            <td className="align-middle">
                                25000
                            </td>
                            <td className="align-middle">deskripsi item</td>
                            <td className="align-middle">
                                    <Button
                                    style="width:135px; color:red;"
                                    >
                                    Delete
                                    </Button>
                                    </td>
                                    <td className="align-middle">
                                    <Button
                                    style="width:135px; color:green;"
                                    >
                                    Edit
                                    </Button>
                                </td>
                        </tr>
                        </tbody>
                        </Table>
