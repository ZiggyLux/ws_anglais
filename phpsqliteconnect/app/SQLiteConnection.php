<?php
namespace App;

/**
 * SQLite connnection
 */
class SQLiteConnection {
    /**
     * PDO instance
     * @var type 
     */
    private $pdo;

    /**
     * return in instance of the PDO object that connects to the SQLite database
     * @return \PDO
     */
    public function connect() {
        if ($this->pdo == null) {
            $this->pdo = new \PDO("sqlite:" . Config::PATH_TO_SQLITE_FILE);
        }
        return $this->pdo;
    }
	
  /**
	 * Obtient le vocable comme une liste d'objets mais d'identifiant donné
	 * @return un tableau d'objets vocables
     */
    public function litVocable($tirage) {
        $stmt = $this->pdo->query(
			"SELECT Identifiant, Vocable, Phono, Type, Définition, Traduction from anglais " .
			"where Identifiant = \"". $tirage . "\" limit 10"
		);

        $vocable = [];
        while ($enreg = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $vocable[] = [
				'identifiant'	=> $enreg['Identifiant'],
				'vocable'		=> $enreg['Vocable'],
				'phono'			=> $enreg['Phono'],
				'type'			=> $enreg['Type'],
				'définition'	=> $enreg['Définition'],
				'traduction'	=> $enreg['Traduction'],
			];
        }

        return $vocable;
    }	
  /**
	 * Obtient les vocables comme une liste d'objets
	 * @return un tableau d'objets vocables
     */
    public function litVocables() {
        $stmt = $this->pdo->query("SELECT Identifiant, Vocable, Phono, Type, Définition, Traduction from anglais limit 10");

        $vocables = [];
        while ($enreg = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $vocables[] = [
				'identifiant'	=> $enreg['Identifiant'],
				'vocable'		=> $enreg['Vocable'],
				'phono'			=> $enreg['Phono'],
				'type'			=> $enreg['Type'],
				'définition'	=> $enreg['Définition'],
				'traduction'	=> $enreg['Traduction'],
			];
        }

        return $vocables;
    }	
	/**
	 * Obtient les identifiants comme une liste d'objets
	 * @return un tableau d'objets vocables
     */
    public function litTickets() {
        $stmt = $this->pdo->query("SELECT Identifiant from anglais limit 1000");

        $tickets = array();
		$i = 0;
        while ($enreg = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            $tickets[$i++] = $enreg['Identifiant'];
        }

        return $tickets;
    }	
}
?>