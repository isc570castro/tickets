<?php
class Presupuesto
{    	
	public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Consultar()
	{
		try
		{
			$stm = $this->pdo->prepare("SELECT * FROM presupuesto, clientes WHERE clientes.idCliente=presupuesto.idCliente");
			$stm->execute();
			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	public function Obtener($idPresupuesto)
	{
		$stm = $this->pdo
		->prepare("SELECT * FROM presupuesto, clientes WHERE idPresupuesto=? and presupuesto.idCliente=clientes.idCliente");
		$stm->execute(array($idPresupuesto));
		return $stm->fetch(PDO::FETCH_OBJ);
	}

	public function ObtenerDetalles($idPresupuesto,$tipoMadera)
	{
		$stm = $this->pdo->prepare("SELECT * FROM materiaPrima where idPresupuesto=? and tipoMadera=?");
		$stm->execute(array($idPresupuesto, $tipoMadera));
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}
}
?>