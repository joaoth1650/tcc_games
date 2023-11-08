import axios from 'axios';
import React, { useEffect, useState } from 'react';

const PriceFilter = ({ onFilterChange }: any) => {
    const [minPrice, setMinPrice] = useState('');
    const [maxPrice, setMaxPrice] = useState('');

    const handleFilterChange = () => {
        if (onFilterChange) {
            axios.get(`/navegar?minPrice=${minPrice}&maxPrice=${maxPrice}`)
                .then((response) => {
                    onFilterChange(response.data);
                })
                .catch((error) => {
                    console.error(error);
                });
        }
    };


    return (
        <div className="bg-white rounded-lg shadow p-4">
            <div className="mb-4">
                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="minPrice">
                    Valor mínimo:
                </label>
                <input
                    className="border rounded-lg py-2 px-3 text-gray-700 w-full"
                    type="number"
                    id="minPrice"
                    value={minPrice}
                    onChange={(e) => setMinPrice(e.target.value)}
                />
            </div>

            <div className="mb-4">
                <label className="block text-gray-700 text-sm font-bold mb-2" htmlFor="maxPrice">
                    Valor máximo:
                </label>
                <input
                    className="border rounded-lg py-2 px-3 text-gray-700 w-full"
                    type="number"
                    id="maxPrice"
                    value={maxPrice}
                    onChange={(e) => setMaxPrice(e.target.value)}
                />
            </div>

            <button
                className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                onClick={handleFilterChange}
            >
                Filtrar
            </button>
        </div>
    );
};

export default PriceFilter;
