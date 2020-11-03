package modelController;

import java.io.Serializable;

import javax.annotation.Resource;
import javax.enterprise.context.SessionScoped;
import javax.inject.Named;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.transaction.UserTransaction;

@Named
@SessionScoped

public class materialControl implements Serializable {
	
	private static final long serialVersionUID = 1L;
	
	private Material material;
	
	materialControl(){
		material = new Material();
	}
	
	@PersistenceContext(unitName = "XXS")
	private EntityManager em;    

	@Resource
	private UserTransaction userTransaction;

	public Material getMaterial() {
		return material;
	}

	public void setMaterial(Material material) {
		this.material = material;
	}
	
	public void guardar() throws Exception  {
	    userTransaction.begin();
	    em.persist(material);
	    userTransaction.commit();
	}

}