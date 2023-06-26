import React from "react";
import { useState, useEffect } from 'react';
import 'bootstrap/dist/css/bootstrap.css';


 function Pelatihan() {

        //ini state
        const [pelatihan, setPelatihan] = useState([]);
    
        //define method
        const fetchDataPelatihan = async () => {
    
            //fetch data from API with Axios
            window.axios.get('/api/pelatihan')
                .then(response => {
                    
                    //assign response data to state "pelatihan"
                    setPelatihan(response.data.data);
                })
            
        }
    
        //run hook useEffect
        useEffect(() => {
            
            //call method "fetchDataPelatihan"
            fetchDataPelatihan();
    
        }, []);
    
    return (
        <div className="container mt-5 mb-5">
        <div className="row">
            <div className="col-md-12">
                <Link to="/posts/create" className="btn btn-md btn-success rounded shadow border-0 mb-3">ADD NEW POST</Link>
                <div className="card border-0 rounded shadow">
                    <div className="card-body">
                        <table className="table table-bordered">
                            <thead className="bg-dark text-white">
                                <tr>
                                    <th scope="col" style={{ 'width': '15%' }}>Nama Pelatihan</th>
                                    <th scope="col" style={{ 'width': '15%' }}>Jenis Pelatihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                {
                                    pelatihan.length > 0
                                        ?   pelatihan.map((pelatihan, index) => (
                                                <tr key={ index }>
                                                    <td>{ pelatihan.nama_pelatihan }</td>
                                                    <td>{ pelatihan.jenis_pelatihan }</td>

                                                </tr>
                                            ))

                                        :   <tr>
                                                <td colSpan="4" className="text-center">
                                                    <div className="alert alert-danger mb-0">
                                                        Data Belum Tersedia!
                                                    </div>
                                                </td>
                                            </tr>
                                }
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    )
}

export default Pelatihan