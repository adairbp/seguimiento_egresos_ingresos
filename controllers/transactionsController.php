<?php

cLass transactionsController extends AppsController
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$conditions = array(
		"conditions" => "transactions.account_id = accounts.id and transactions.category_id = categories.id"
		);

		//Valor de la columna que se envia al archivo database.php para realizar la suma de amount de la tabla transacciones.
		$columnaSuma = array(
			"columna" => "transactions.amount"
		);

		//Consultas que se estan pasando al index
		$transactions = $this->transactions->find("transactions, accounts, categories", "all", $conditions);
		$transactionsCount = $this->transactions->find("transactions", "count");
		$transactionsSuma = $this->transactions->find("transactions", "suma", $columnaSuma);
		//Compact une las tres consultas para enviar los valores al index
		$this->set(compact("transactions", "transactionsCount", "transactionsSuma"));
	}

	public function add()
	{
		
			//Si vienen datos del formulario, haz las siguientes operaciones
			if ($_POST) 
			{
				//Separación de los valores operation y amount
				//Condición Si operación es igual a egreso convierte el monto a negativo	
				if ($_POST["operation"] == 'egreso'){
					$_POST["amount"] = $_POST["amount"]*(-1);
				}
					
				if ($this->transactions->save("transactions", $_POST)) 
				{
					$this->redirect(array("controller"=>"transactions"));
				} else 
				{
					$this->redirect(array("controller"=>"transactions", "method"=>"add"));
				}
			}

			$this->set("accounts", $this->transactions->find("accounts"));
			$this->set("categories", $this->transactions->find("categories"));
			$this->_view->setView("add");
		
	}

	public function edit($id)
	{
		if ($id) 
		{
			$options = array(
			"conditions" => "id=".$id
			);
			$transaction = $this->transactions->find("transactions","first", $options);
			$this->set("transaction", $transaction);
			$this->set("accounts", $this->transactions->find("accounts"));
			$this->set("categories", $this->transactions->find("categories"));
		}

		if ($_POST) 
		{
			if ($_POST["operation"] == 'egreso'){
				$_POST["amount"] = $_POST["amount"]*(-1);
			}
			
			if ($this->transactions->update("transactions", $_POST)) 
			{
				$this->redirect(
					array(
						"controller"=>"transactions"
					)
				);
			} else 
			{
				$this->redirect(
					array(
						"controller"=>"transactions",
						"method"=>"edit/".$_POST["id"]
					)
				);
			}
		}
	}


	public function delete($id)
	{
		if ($_GET) 
		{
			$conditions = "id=".$id;
			if ($this->transactions->delete("transactions", $conditions)) 
			{
				$this->redirect(array("controller"=>"transactions"));
			} else 
			{
				$this->redirect(array("controller"=>"transactions", "method"=>"add"));
			}
		}
	}

}
