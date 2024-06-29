# Front/Back-end de um Banco Online com Previsão de Risco de Crédito

## Objetivos

Entregar um site do gênero bancário, fictício, que permite o acesso e cadastro de clientes, visualização do empréstimo que possuem direito e saldo. Adicionalmente, existirá perfis de acesso onde a gestão poderá visualizar o impacto no negócio da implementação de um modelo de machine learning que prevê o risco de crédito dos clientes.

## Entregáveis

- **Front/Back-end do Site**
  - Página:
    - inicial
    - de Cadastro e Login
    - de Perfil do cliente
    - com relatório para a gestão
  - Perfis de acesso ao banco de dados
  - Perfis de acesso às páginas do site
- **Previsão do Risco de Crédito**
  - Análise Exploratória de Dados
  - Modelagem
    - Feature Importance & Scaling
    - Validação Cruzada
    - Tunagem de Hiperparâmetros
  - Deploy de Modelo para Previsão de Risco de Crédito
  - Impacto do modelo no contexto de negócio
   
## Apêndice

- Entendimento do Contexto de Negócio
- Desenvolvimento Frontend
- Desenvolvimento Backend
- Análise Exploratória de Dados
- Perguntas Relevantes de Negócio
- Modelo de Machine Learning
- Tunagem de Hiperparâmetros
- Análise de Negócio
- Desafios Relevantes encontrados

## Entendimento do Contexto de Negócio

- Explicar qual o contexto de negócio bancário, o que um cliente espera ao se filiar e vice versa.
  - O que é um banco
  - O que é um usuário para esse banco
  - O que é um empréstimo
  - Quais os tipos de agências bancárias e como essa maneira de gerir afeta o risco de crédito oferecido por um banco online
  - ...**inserir mais tópicos interessantes de contextualização de negócio**...


## Desenvolvimento Front-end

.

## Desenvolvimento Back-end

.

## Análise Exploratória de Dados

- descrição do dataset (markdown)
  - o que é cada variável e respectiva unidade de valor
- Importação das libs
- Definir as funções que serão utilizadas no projeto 
  - preprocessing
  - matriz de confusao
  - divisao de (X,y) em treino/teste e resultado dos scores
- `.shape`, `.info()`, `.describe()`, `.head()`:
  - Verificar o que significa cada coluna
  - Verificar padrões nos dados
  - Tratamento de dados nulos, duplicados, outliers
  - remover colunas que não agregam informação à EDA
- Análise univariada e bivariada de:
  - Variáveis numéricas; e
  - Variáveis categóricas:
    - Análise de KDEplots
    - Análise dos gráficos de contagem
    - Análise de boxplots
    - Análise dos gráficos de violino
    - Análise de histogramas
    - Análise dos gráficos de pontos
- Resultados principais da EDA
  - Teste de Hipótese
  - Variáveis com a possibilidade de ser maior indicador da classificação de um risco de crédito

## Perguntas Relevantes de Negócio

- responder à cinco perguntas de negócios relevantes

## Modelo de Machine Learning

### Modelagem

- remover colunas que não agregam informação à modelagem
- Correlação de pearson
- Encoding de variáveis categóricas
- Preparação de dados: inserir sobre SimpleImputer ou StandardScaler se foi utilizado
- Testar os modelos de ML
  - accuracy_score
  - confusion_matrix 
  - classification_report
  
### Importância das Features (maior para menor – 10 primeiras)

- Descrever como chegou à conclusão da Feature Engineering
  - Entropia, ratios, média, mediana, std, duplicates entre variáveis
  - Divisão entre valores de uma variável por outra
- Inserir tabela com features com maior importância do modelo de ML

### Validação Cruzada

- Validação Cruzada: inserir sobre StratifiedKFold da biblioteca sklearn.model_selection se foi utilizado

### Tunagem de Hiperparâmetros

- Bayesian Search, Optuna

## Análise de Negócio

- Modelo escolhido:
  - Score Cross Validation
  - Average Precision
  - Precision Score
  - Recall Score
  - F1 Score
  - ROC AUC Score

Inserir um ou dois exemplos do benefício de aplicação do modelo de ML no contexto de negócio visando lucro.

## Desafios Relevantes encontrados

- Problema: transformar o banco de dados de `.csv` para `.sql` ou `.db`.
  - Solução: código em Python da library Pandas executa a transformação.
- Problema: encontrar um bom banco de dados para o problema de risco de crédito.
- Problema: integrar o modelo de ML para prever através da lib FastAPI e Pickle com o site
- ...
