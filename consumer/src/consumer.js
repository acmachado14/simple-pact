const axios = require('axios')

const baseUrl = `http://127.0.0.1:8001`;

const sum = async (num1, num2) => {
  const response = await axios.post(`${baseUrl}/sum`, {
    number1: num1,
    number2: num2
  }, {
    headers: {
      'Content-Type': 'application/json',
    }
  });

  return await response;
}

module.exports = {
  sum
};