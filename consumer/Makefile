build:
	@docker build -t acmachado/pact-consumer:1.0 .
.PHONY: build

run-it:
	@docker run -it --rm --name consumer --network contract-pact_default acmachado/pact-consumer:1.0 bash
.PHONY: run-it