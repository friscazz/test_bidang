import React from "react";
import { useState, useEffect } from 'react';
import user from "../../Models/user";
import 'bootstrap/dist/css/bootstrap.css';



 function Dashboard() {

        //ini state
        const [dashboard, setDashboard] = useState([]);
    
        //define method
        const fetchDataDashboard = async () => {
    
            //fetch data from API with Axios
            window.axios.get('/api/dashboard/show')
                .then(response => {
                    
                    //assign response data to state "dashboard"
                    setDashboard(response.data.data.data);
                })
            
        }
    
        //run hook useEffect
        useEffect(() => {
            
            //call method "fetchDataDasgboard"
            fetchDataDashboard();
    
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
                                    <th scope="col" style={{ 'width': '15%' }}>jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                {
                                    dashboard.length > 0
                                        ?   dashboard.map((dashboard, index) => (
                                                <tr key={ index }>
                                                    <td>{ dashboard.jumlah }</td>
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

export default Dashboard