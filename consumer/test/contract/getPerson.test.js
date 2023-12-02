"use strict"

const { expect } = require('chai')
const { Matchers } = require("@pact-foundation/pact")

const { getPerson } = require('../../src/consumer')

describe('API Pact test - Integration between \'backend\' and \'frontend\'', () => {
  describe("GET /person/:id", () => {
    const expectedBody = {
      first_name: 'Angelo',
      last_name: 'Machado',
      alias: 'gelin',
      age: 19,
    }

    before (async () => {
      await mockProvider.addInteraction({
        uponReceiving: "a request for person with id 1",
        withRequest: {
          method: "GET",
          path: "/person/1"
        },
        willRespondWith: {
          status: 200,
          body: Matchers.like(expectedBody),
        },
      })
    })

    it("returns correct body, header and statusCode", async () => {
      const response = await getPerson(1)
      expect(response.data).to.deep.equal(expectedBody)
      expect(response.status).to.equal(200)
    })
  })
})