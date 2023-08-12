import React from 'react';

export default function ListItems({ value }) {
  return (
    <div className="card p-2 m-1 d-flex align-items-center justify-content-center" style={{ width: "60px", height: "60px" }}>
      <p className="text-center">{value}</p>
    </div>
  );
}
