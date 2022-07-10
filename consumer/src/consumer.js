const axios = require('axios')

const baseUrl = `http://localhost:8001`;

const getPerson = async (id) => {
  return await axios.get(`${baseUrl}/person/${id}`);
}

module.exports = {
    getPerson,
};