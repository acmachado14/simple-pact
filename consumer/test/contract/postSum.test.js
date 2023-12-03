"use strict";

const { expect } = require("chai");
const { Matchers } = require("@pact-foundation/pact");

const { sum } = require("../../src/consumer");

describe("API Pact test", () => {
  describe("POST /sum", () => {
    const expectedBody = {
      result: 30,
    };

    const requestPayload = {
      number1: Matchers.somethingLike(10),
      number2: Matchers.somethingLike(20),
    };

    before(async () => {
      await mockProvider.addInteraction({
        uponReceiving: "a request to calculate the sum of two numbers",
        withRequest: {
          method: "POST",
          path: "/sum",
          body: requestPayload,
        },
        willRespondWith: {
          status: 200,
          body: Matchers.like(expectedBody),
        },
      });
    });

    it("returns correct body, header, and statusCode", async () => {
      const response = await sum(10, 20);
      expect(response.data).to.deep.equal(expectedBody);
      expect(response.status).to.equal(200);
    });
  });
});
